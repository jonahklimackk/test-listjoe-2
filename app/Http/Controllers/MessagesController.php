<?php

namespace App\Http\Controllers;

use Log;
use Auth;
use App\Models\Message;
use Illuminate\Http\Request;

class MessagesController extends Controller
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
	* Send a public or private message
	*
	* @return void
	*/
	public function send(Request $request)
	{
		$validatedData = $request->validate([
			'message' => 'required|string|max:2000',
		]);

		$message = Message::create([
			'user_id' => Auth::user()->id,
			'to_user_id' => $request->to_user_id,
			'body' => $request->message,
			'answer_id' => $request->answer_id ? $request->answer_id : 0,
			'tab_width' => $request->tab_width ?  $request->tab_width : 10,
			'type' => $request->type,
		]);

		return ['result' => true];
	}




	/**
	* Delete the message
	*
	* @return void
	*/
	public function delete($id)
	{
		$message = Message::find($id);

		if (isset($message))
		{
			$message->delete();
			return ['result' => true];
		}
		else
			return ['result' => false];



	}
}