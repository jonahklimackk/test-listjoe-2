<?php

namespace App\Http\Controllers;

use Mail;
use Auth;
use Validator;
use Carbon\Carbon;
use App\Mail\MailingQueued;
use App\Models\Logins;
use App\Models\User;
use App\Models\Mailing;
use App\Models\Membership;
use App\Helpers\Downline;
use Carbon\CarbonInterface;
use Illuminate\Http\Request;

class SendMailingController extends Controller
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
	* show sendmailing page
	*
	* @return void
	*/
	public function show()
	{
		//init vars
		$user = Auth::user();
		$previousMailings = Mailing::where('user_id', $user->id)->get()->all();
		$membership = Membership::where('name',$user->membership)->get()->first();
		// dd($membership);

		$user->num_downline = Downline::getCount($user);
		$user->human_time_left = Mailing::getHumanNextMailing($user);
		$user->can_send_mail = Mailing::canSendMail($user);
		$user->last_mailing = Mailing::getLastMailingDate($user);

		return View('members.sendmail',compact('user', 'previousMailings', 'membership'));
	}




	/**
	* Return the previous mailing with this id
	*
	* @return void
	*/
	public function loadMailing($id)
	{
		return Mailing::find($id);
	}




	/**
	* Queue the mailing
	*
	* @return void
	*/
	public function queue(Request $request)
	{

		if (! Mailing::canSendMail(Auth::user()))
			return View('members.sendmail')->with('alertMessage','It is still not time for you to send a mailing');


		$validatedData = $request->validate([
			'subject' => 'required|string|max:200',
			'message' => 'required|string|max:5000',
			'url' => 'required|url|max:500',
			'credits' => 'required|integer|max:'.Auth::user()->membership()->credits_max
		]);

		if ($request->preview){

			$logins = Logins::where('user_id', Auth::user()->id)->get()->sortByDesc('updated_at')->first();
			return view('members.sendmail-preview',compact('request','logins'));
		}

		if ($request->credits_spent > Auth::user()->credits)
			return View('members.sendmail')->with('alertMessage',"You don't have enough credits");

		//calculate recipients
		$recipients = $request->number_people_downline + $request->mailing_bonus_credits + $request->credits_spent;

		if (! $recipients)
			return View('members.sendmail')->with('alertMessage','You have no recipients. Please enter some credits');

		$totalUsers = User::all()->count();

		if ($recipients > $totalUsers)
			$recipients = $totalUsers;


		$mailing = Mailing::firstOrCreate([
			'user_id' => Auth::user()->id,
			'subject' => $request->subject,
			'body'=> $request->message,
			'url' => $request->url,
			'recipients' => $recipients,
			'status' => 'queued',
			'credits' => $request->credits_spent,
			'save_message' => 1,
			'send_to_downline' => 0
		]);

		$admin = User::find(config('listjoe.admin_id'));
		Mail::to($admin)->send(new MailingQueued(Auth::user(),$recipients,$mailing));

		return redirect('sendmail/thankyou')->with('alertMessage', 'You have succesfully queued a mailing! It will be sent shortly.');
		;
	}




	/**
	* Show thank you page after submission of mailing
	*
	* @return void
	*/
	public function thanks(Request $request)
	{
		return view('members.sendmailing-thankyou');
	}




}
