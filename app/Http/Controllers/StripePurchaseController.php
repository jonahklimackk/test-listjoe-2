<?php

namespace App\Http\Controllers;

use Mail;
use Auth;
use Cookie;
use Carbon\Carbon;
use App\Models\User;
use App\Models\SoloOrders;
use App\Models\Campaigns;
use App\Models\Membership;
use App\Mail\SponsorCommission;
use Illuminate\Http\Request;
use App\Models\CreditsOrders;
use App\Helpers\AffiliateTracker;
use App\Models\SubscriptionOrders;

class StripePurchaseController extends Controller
{
    /**
    * Process a successful payment by stripe checkout for a membership
    *
    * @return void
    */
    public function processMembership($membershipId, $checkoutSessionId, Request $request)
    {


        if (Auth::user()) {   

            switch ($membershipId) {
                case 1:
                $price = '27';
                $membershipName = 'bronze';
                $membershipId = 2;
                $expiresAtDate = new Carbon('1 month');
                break;
                case 2:
                $price = '47';
                $membershipName = 'silver';
                $expiresAtDate = new Carbon('1 month');
                $membershipId = 3;
                break;
                case 3:
                $price = '67';
                $membershipName = 'gold';
                $expiresAtDate = new Carbon('1 month');
                $membershipId = 4;
                break;
                case 4:
                $price = '197';
                $membershipName = 'gold';
                $expiresAtDate = new Carbon('6 months');
                $membershipId = 4;
                break;
                case 5:
                $price = '297';
                $membershipName = 'gold';
                $expiresAtDate = new Carbon('1 year');
                $membershipId = 4;
                break;

                //
                //50% off
                //
                case 6:
                $price = '13.50';
                $membershipName = 'bronze';
                $membershipId = 2;
                $expiresAtDate = new Carbon('1 month');
                break;
                case 7:
                $price = '23.50';
                $membershipName = 'silver';
                $expiresAtDate = new Carbon('1 month');
                $membershipId = 3;
                break;
                case 8:
                $price = '33.50';
                $membershipName = 'gold';
                $expiresAtDate = new Carbon('1 month');
                $membershipId = 4;
                break;
                case 9:
                $price = '98.50';
                $membershipName = 'gold';
                $expiresAtDate = new Carbon('6 months');
                $membershipId = 4;
                break;
                case 10:
                $price = '148.50';
                $membershipName = 'gold';
                $expiresAtDate = new Carbon('1 year');
                $membershipId = 4;
                break;                
            }

            //error if order already there in case of refressh
            if (SubscriptionOrders::where('checkout_session_id', $checkoutSessionId)->get()->count()) {
                return view('members.payment.duplicate');
            }
            else {

                //this is the source that determines memebership
                Auth::user()->membership=$membershipName;
                Auth::user()->save(); 

                //which campaign resuted in nsale 
                $this->recordCampaign();

                $subscriptionOrder = SubscriptionOrders::create([
                    'user_id' => Auth::user()->id,
                    'sponsor_id' => Auth::user()->sponsor_id,
                    'membership_id' => $membershipId,
                    'price' => $price,
                    'checkout_session_id' => $checkoutSessionId,
                    'ends_at' => $expiresAtDate
                ]); 



                //mail the sponsor - only for subscriptions
                $sponsor = User::fetchSponsor(Auth::user());
                $subscriptionOrder->name = Membership::where('id', $subscriptionOrder->membership_id)->pluck('name')->first();
                Mail::to($sponsor)->send(New SponsorCommission($sponsor,Auth::user(),$subscriptionOrder));


                return view('members.payment.thank-you')->with('message','Your account has now been upgraded to  '.$membershipName.'.');
            }
        }
        else
            // no auth user
            return view('members.payment.error');
    }




    /**
    * Process a successful payment by stripe checkout for credits
    *
    * @return void
    */
    public function processCredits($creditsId, $checkoutSessionId, Request $request)
    {


        // if (strlen($checkoutSessionId) != ){

        //     return view('members.payment.error');   

        // }

        // dump($creditsId);
        // dump($checkoutSessionId);
        // dump(Auth::user());

        if (Auth::user()) {   

            //initialize 
            switch ($creditsId) {
                case 1:
                $credits = 3000;
                $price = '12';
                break;
                case 2:
                $credits = 8000;
                $price = '27';
                break;
                case 3:
                $credits = 20000;
                $price = '57';
                break;
                case 4:
                $credits = 50000;
                $price = '97';
                break;
                case 5:
                $credits = 150000;
                $price = '197';
                break;
                //
                //50% off
                //
                case 6:
                $credits = 3000;
                $price = '6';
                break;
                case 7:
                $credits = 8000;
                $price = '13.50';
                break;
                case 8:
                $credits = 20000;
                $price = '28.50';
                break;
                case 9:
                $credits = 50000;
                $price = '48.50';
                break;
                case 10:
                $credits = 150000;
                $price = '98.50';
                break;
            }



            //error if order already there in case of refressh
            if (CreditsOrders::where('checkout_session_id', $checkoutSessionId)->get()->count()) {
                return view('members.payment.duplicate');
            }
            else {

                //really important to do this
                Auth::user()->credits += $credits;
                Auth::user()->save(); 

                //so users ccan trak whihc acdampaign resu;lt3ee in a sale  
                //actualy disabling this b/c i dont want giv e cmomissions
                // no credits sales
                // $this->recordCampaign();


                $order = CreditsOrders::create([
                    'user_id' => Auth::user()->id,
                    'sponsor_id' => Auth::user()->sponsor_id,
                    'credits' => $credits,
                    'price' => $price,
                    'checkout_session_id' => $checkoutSessionId,
                ]);



                return view('members.payment.thank-you')->with('message','Your account has now been credited with '.$credits.' credits.');              
            }
        }
        else
            // no auth user
            return view('members.payment.error');        

    }




    /**
    * Process a successful payment by for various otos
    *
    * @return void
    */
    public function processOto($productId, $checkoutSessionId, Request $request)
    {

        //$47 for bronze 6 months and 15 solo ad tokens
        if (Auth::user()) { 


             //error if order already there in case of refressh
            if (SubscriptionOrders::where('checkout_session_id', $checkoutSessionId)->get()->count()) {
                return view('members.payment.duplicate');
            }
            else if ($productId == 1){

                //this is the source that determines memebership
                Auth::user()->membership='bronze';
                Auth::user()->solo_tokens += 15;
                Auth::user()->credits += 50000;
                Auth::user()->save(); 

                //which campaign resuted in nsale 
                $this->recordCampaign();

                $membershipId = 2;
                $membershipName = 'bronze';
                $expiresAtDate = new Carbon('1 year');



                $subscriptionOrder = SubscriptionOrders::create([
                    'user_id' => Auth::user()->id,
                    'sponsor_id' => Auth::user()->sponsor_id,
                    'membership_id' => $membershipId,
                    'price' => 37.00,
                    'checkout_session_id' => $checkoutSessionId,
                    'ends_at' =>  $expiresAtDate,
                ]); 



                //mail the sponsor - only for subscriptions
                $sponsor = User::fetchSponsor(Auth::user());
                $subscriptionOrder->name = Membership::where('id', $subscriptionOrder->membership_id)->pluck('name')->first();
                Mail::to($sponsor)->send(New SponsorCommission($sponsor,Auth::user(),$subscriptionOrder));


                return view('members.payment.thank-you')->with('message','Your account has now been upgraded to  '.$membershipName.' and your account has been credited with 15 solo ad tokens and 50,000 credits. ');
            }
            else if ($productId == 2) {

                Auth::user()->membership='gold';
                Auth::user()->solo_tokens += 40;
                Auth::user()->credits += 150000;
                Auth::user()->save(); 

                //which campaign resuted in nsale 
                $this->recordCampaign();

                $membershipId = 4;
                $membershipName = 'gold';
                $expiresAtDate = new Carbon('1 year');



                $subscriptionOrder = SubscriptionOrders::create([
                    'user_id' => Auth::user()->id,
                    'sponsor_id' => Auth::user()->sponsor_id,
                    'membership_id' => $membershipId,
                    'price' => 97.00,
                    'checkout_session_id' => $checkoutSessionId,
                    'ends_at' =>  $expiresAtDate,
                ]); 



                //mail the sponsor - only for subscriptions
                $sponsor = User::fetchSponsor(Auth::user());
                $subscriptionOrder->name = Membership::where('id', $subscriptionOrder->membership_id)->pluck('name')->first();
                Mail::to($sponsor)->send(New SponsorCommission($sponsor,Auth::user(),$subscriptionOrder));


                return view('members.payment.thank-you')->with('message','Your account has now been upgraded to  '.$membershipName.' and your account has been credited with 40 solo ad tokens and 150,000 credits. ');



            }
        }
        else
            return view('members.payment.error');



    }



    /**
    * Process a successful payment for solo ad tokens
    *
    * @return void
    */
    public function processSoloAdTokens($productId, $checkoutSessionId, Request $request)
    {

        if (Auth::user()) { 

                    //initialize 
            switch ($productId) {
                case 1:
                $soloAdTokens = 2;
                $price = 17;
                break;
                case 2:
                $soloAdTokens = 5;
                $price = 37;
                break;
                case 3:
                $soloAdTokens = 15;
                $price = 97;
                break;
                case 4:
                $soloAdTokens = 40;
                $price = 197;
                break;
            }


            //error if order already there in case of refressh
            if (SoloOrders::where('checkout_session_id', $checkoutSessionId)->get()->count()) {
                return view('members.payment.duplicate');
            }
            else {

                //really important to do this
                Auth::user()->solo_tokens += $soloAdTokens;
                Auth::user()->save(); 

                //so users ccan trak whihc acdampaign resu;lt3ee in a sale  
                //actualy disabling this b/c i dont want giv e cmomissions
                // no credits sales
                // $this->recordCampaign();


                $order = SoloOrders::create([
                    'user_id' => Auth::user()->id,
                    'sponsor_id' => Auth::user()->sponsor_id,
                    'solo_ad_tokens' => $soloAdTokens,
                    'price' => $price,
                    'checkout_session_id' => $checkoutSessionId,
                ]);



                return view('members.payment.thank-you')->with('message','Your account has now been credited with '.$soloAdTokens.' solo ad tokens.');
            }


        }
        else
          return view('members.payment.error');








  }


    /**
    * Get the campaign and pass it off to get recorded
    *
    * @return void
    */
    public function recordCampaign()
    {
        $campaignName= Cookie::get('campaign');
        $campaign = Campaigns::where('affiliate_id',User::getSponsor()->id)->where('value', $campaignName)->get()->first();
        if ($campaign)
            AffiliateTracker::recordSale($campaign->id);     
    }


}
