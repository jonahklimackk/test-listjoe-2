<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Mailing;
use Illuminate\Http\Request;

class SendmailHistoryController extends Controller
{
    //

	/**
	* show sendmail history page
	*
	* @return void
	*/
	public function show()
	{
		$user = Auth::user();

		$mailings = Mailing::where('user_id', $user->id)->where('solo', false)->get()->all();

		return View('members.mail-history',compact('user', 'mailings'));
	}




	/**
	* show an individual mailing in preview format
	*
	* @return void
	*/
	public function loadMailingPreview()
	{

		//
	}
}
