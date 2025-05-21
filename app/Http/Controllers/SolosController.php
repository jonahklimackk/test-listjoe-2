<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Mailing;
use Illuminate\Http\Request;

class SolosController extends Controller
{
    	/**
	* create a new Controller Instance
	*
	* @return void
	*/
	public function __construct()
	{
		// $this->middleware('auth');
	}



	/**
	* show sendmail send page
	*
	* @return void
	*/
	public function show()
	{
		$user = Auth::user();

		return View('members.solos',compact('user'));
	}


	/**
	* show sendmail buy page
	*
	* @return void
	*/
	public function buy()
	{
		$user = Auth::user();

		return View('members.upgrade.buy-solos',compact('user'));
	}



	/**
	* Add Solo Ad to queue
	*
	* @return void
	*/
	public function queue(Request $request)
	{
		$queuedSoloMailings = Mailing::where('user_id', Auth::user()->id)->where('solo', 1)->where('status','queued')->get()->count();

		if($queuedSoloMailings >= Auth::user()->solo_tokens)
			return redirect('members/solos')->with('message', 'You already have '.$queuedSoloMailings.' queued solo mailings');


		$validatedData = $request->validate([
			'subject' => 'required|string|max:200',
			'message' => 'required|string|max:5000',
			'url' => 'required|url|max:500'
		]);

		if ($request->preview)
			return view('members.solos-preview',compact('request'));

		$user = Auth::user();
		if ($user->solo_tokens)
			$soloMailing = Mailing::firstOrCreate([
				'user_id' => $user->id,
				'subject' => $request->subject,
				'body'=> $request->message,
				'url' => $request->url,
				'recipients' => User::all()->count(),
				'solo' => true,
				'save_message' => false,
				'send_to_downline' => false,
				'status' => 'queued',
			]);

		return redirect('members/solos')->with('message', 'Thanks for submitting your ad, it is now in the queue.');
	}




	/**
	* load a preview of the solo mailing
	*
	* @return void
	*/
	public function preview(Request $request)
	{

		return View('members.preview-solos',compact('request'));
	}



	/**
	* Load a directory of past solo ads
	*
	* @return void
	*/
	public function history()
	{
		$user = Auth::user();
		$mailings = Mailing::where('user_id',Auth::user()->id)->where('solo',true)->get()->all();
		return View('members.solos-history',compact('user','mailings'));
	}




}
