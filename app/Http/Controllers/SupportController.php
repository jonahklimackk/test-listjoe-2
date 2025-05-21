<?php

namespace App\Http\Controllers;

use Auth;
use Mail;
use App\Models\User;
use App\Models\SupportTickets;
use App\Mail\SupportTicket;
use Illuminate\Http\Request;

class SupportController extends Controller
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
	* show the submit knowledge base page
	*
	* @return void
	*/
	public function knowledgeBase()
	{

		$user = Auth::user();


		return View('members.knowledge-base',compact('user'));
	}


	/**
	* show the submit tickets page
	*
	* @return void
	*/
	public function showSubmitTicket()
	{

		$user = Auth::user();


		return View('members.submit-ticket',compact('user'));
	}


	/**
	* process the submission
	*
	* @return void
	*/
	public function submitTicket(Request $request)
	{
		$user = Auth::user();

		$validatedData = $request->validate([
			'user_id' => 'integer',
			'name' => 'required|string',
			'email' => 'required|email',
			'subject' => 'required|string',
			'message' => 'required|string'
		]);

		$supportTicket = new SupportTickets;
		$supportTicket->user_id = $user->id;
		$supportTicket->name = $request->name;
		$supportTicket->email = $request->email;
		$supportTicket->subject = $request->subject;
		$supportTicket->message = $request->message;
		$supportTicket->save();

		// Mail::to(env('MAIL_FROM_ADDRESS'))->send(new SupportTicket($supportTicket,$user));

		Mail::to(User::find(1))->send(new SupportTicket($supportTicket,$user));

		return View('members.submit-ticket', compact('user'))->with('supportMessage', 'Thank you! We will get back to you within 24 hours.');


		// return View('members.submit-ticket',compact('user')->with('hi','sdfdfz'));
	}
}
