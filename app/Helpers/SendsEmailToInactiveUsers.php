<?php

namespace app\Helpers;

use Mail;
use App\Mail\InactiveUser;
use App\Models\User;
use App\Models\Mailing;

class SendsEmailToInactiveUsers
{

	/**
	* Query the users
	*
	* @return int
	*/
	public static function handle()
	{

		// $users = User::orderBy('id', 'asc')->get();
		$users = User::where('id','>','489')->orderBy('id', 'asc')->get();

		foreach($users as $user)
		{
			$mailings = Mailing::where('user_id',$user->id)->get()->all();

			if (! $mailings && $user->credits > 0)				
				$recipients[] = $user;
		}

		dump(count($recipients));		

		foreach ($recipients as $recipient
)
		{

			$subject = "You Have ".$recipient->credits." Unused Credits!!";
			Mail::To($recipient)->send(new InactiveUser($recipient,$subject));
			dump("id: ".$recipient->id."sent mail to ".$recipient->email);
		}
	}
}