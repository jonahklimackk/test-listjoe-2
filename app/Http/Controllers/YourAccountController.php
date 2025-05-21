<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use View;
use Session;
use Redirect;
use Mail;
use App\Mail\UserCancelled;
use App\Models\Membership;
use App\Models\Logins;
use App\Models\User;
use App\Helpers\Error;
use App\Models\Mailing;
use App\Models\LoginAd;
use App\Models\SoloOrders;
use Middleware\MemberAds;
use App\Models\TopMemberAds;
use App\Models\TopEmailAd;
use App\Models\SpotlightAds;
use Illuminate\Http\Request;
use App\Models\CancelFeedback;
use App\Models\CreditsOrders;
use App\Models\SubscriptionOrders;
use Illuminate\Foundation\Configuration\Middleware;

class YourAccountController extends Controller
{

    /**
     * create a new Controller Instance
     *
     * @return void
     */
    public function __construct()
    {
        // $this->middleware('auth');
        // $this->middleware('member.ads');


    }



    /**
    *  This is the first login
    *
    * @return void
    */
    public function dashboardRedirect(Request $request)
    {

        if (Auth::user()->first_login == 1) {

            Auth::user()->first_login = 0;
            Auth::user()->save();

            return view('members.upgrade.first-login-upgrade');
        }
        else if (Auth::user()->second_login == 1) {
            Auth::user()->second_login = 0;
            Auth::user()->save();

            return view('members.upgrade.second-login-upgrade');
        }
        else {


            $loginAd = LoginAd::where('user_id', '!=', Auth::user()->id)->get()->random(1)->first();

            if(is_null($loginAd))
                Redirect::to('/members');

            LoginAd::recordView($loginAd);

            //record ip of peopole loggin in to prevet cheating
            Logins::recordLogin(Auth::user(),$request);



            //reset first and second login
            Auth::user()->first_login = 1;
            Auth::user()->second_login = 1;
            Auth::user()->save();


            return view('members.show-loginad',compact('loginAd'));

        }
    }




    /**
     * show member home page
     *
     * @return void
     */
    public function home()
    {

        return View('members.home');
    }




    /**
    * show member cancel page
    *
    * @return void
    */
    public function showCancel()
    {
        return View('members.cancel');
    }


    /**
    * Process the cancellation request
    *
    * @return void
    */
    public function processCancel(Request $request)
    {


        // $validatedData = $request->validate([
        //     'subject' => 'required|string|max:200',
        // ]);


        $user = User::where('id', Auth::user()->id)->get()->first();

        if (is_null($request->feedback) || isset($request->feedback))
        {
            $feedback = CancelFeedback::create([
                'feedback' => $request->feedback,
                'notes' => $user->username
            ]);



            $admin = User::find(config('listjoe.admin_id'));
            Mail::to($admin)->send(new UserCancelled($user,$feedback));

            $topMemberAds = TopMemberAds::where('user_id',$user->id)->get()->all();
            if ($topMemberAds) {
                foreach($topMemberAds as $topMemberAd) {
                    $topMemberAd->delete();
                }
            }


            $spotLightAds = SpotlightAds::where('user_id',$user->id)->get()->all();
            if ($spotLightAds) {
                foreach($spotLightAds as $spotLightAd) {
                    $spotLightAd->delete();
                }
            }

            $loginAds = LoginAd::where('user_id',$user->id)->get()->all();
            if ($loginAds) {
                foreach($loginAds as $loginAd) {
                    $loginAd->delete();
                }
            }

            $topEmailAds = topEmailAd::where('user_id',$user->id)->get()->all();
            if ($topEmailAds) {
                foreach($topEmailAds as $topEmailAd) {
                    $topEmailAd->delete();
                }
            }

            $mailings = Mailing::where('user_id',$user->id)->get()->all();
            if ($mailings) {
                foreach($mailings as $mailing) {
                    $mailing->delete();
                }
            }

            $user->delete();


            return View('members.cancelled');
        }
        else
            Error::handle('<h1>Unknown Error! Please contact admin</h1>');
    }





    /**
    * show upgrade page
    *
    * @return void
    */
    public function upgrade()
    {

// return View('members.upgrade-paypal');
        return View('members.upgrade.upgrade-50%-off');

       // return View('members.upgrade');
    }








    /**
    * Log the user out
    *
    * @return void
    */
    public function logout()
    {

       $this->forceLogout();
       return Redirect::to("/");
   }



    /**
    * Log the user out
    *
    * @return void
    */
    public function forceLogout()
    {
        $session = DB::table('sessions')->where('user_id', Auth::user()->id)->delete();
        Session::flush();
        // Auth::user()->logout();
    }



    /**
    * List the orders they've placed with us
    *
    * @return void
    */
    public function showOrders()
    {
        $subscriptionOrders = SubscriptionOrders::where('user_id',Auth::user()->id)->get()->all();
        $creditsOrders = CreditsOrders::where('user_id',Auth::user()->id)->get()->all();
        $soloOrders = SoloOrders::where('user_id', Auth::user()->id)->get()->all();

        //pretty and ugly
        foreach($subscriptionOrders as $subscriptionOrder){
            $subscriptionOrder->name=Membership::where('id',$subscriptionOrder->membership_id)->get()->pluck('name')->first();
        }




        return View('members.your-orders', compact('subscriptionOrders', 'creditsOrders', 'soloOrders'));
    }



}
