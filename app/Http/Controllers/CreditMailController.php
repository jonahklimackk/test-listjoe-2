<?php

namespace App\Http\Controllers;

use Auth;

use App\Jobs\SendsMail;
use App\Models\User;
use App\Models\Logins;
use App\Models\Mailing;
use App\Models\TopEmailAd;
use Illuminate\Http\Request;
use App\Helpers\BuildsCreditsUrl;

class CreditMailController extends Controller
{

    /**
    * show a sample html email 
    * credit mail in the browser
    * for testing purpose
    *
    * @return void
    */
    public function showCreditMail()
    {

        $sender = Auth::user();

        $topEmailAd = TopEmailAd::where('user_id', '!=', Auth::user()->id)->get()->random(1)->all();

        $mailing = Mailing::where('user_id', Auth::user()->id)->get()->first();

        $recipient = User::get()->random(1)->first();
        // because I can't get the eloquent relationship right
        $recipientLogin = Logins::where('user_id', $recipient->id)->get()->sortByDesc('updated_at')->first();

        //create the credits url
        $creditsUrl = BuildsCreditsUrl::build($sender,$recipient,$mailing);

        return View('emails.credit-mail.resend-credit-mail',compact('sender','topEmailAd', 'mailing', 'recipient', 'recipientLogin', 'creditsUrl'));
    }



}
