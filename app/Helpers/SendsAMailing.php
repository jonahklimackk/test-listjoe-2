<?php

namespace app\Helpers;

use Mail;
use Auth;
use App\Models\User;
use App\Models\Mailing;
use App\Models\Membership;
use App\Helpers\Downline;
use App\Mail\TestMail;
use App\Jobs\SendsMail;
use App\Helpers\BuildsCreditsUrl;

class SendsAMailing
{

	/**
	* Do what the cron job would do
	*
	* @return int
	*/
	public static function cronjob()
	{

		
		$queuedMailings = Mailing::where('status', 'queued')->orderBy('created_at', 'asc')->get()->all();

		if (!$queuedMailings){
			dd('no queeud mailinfgs');
			exit;
		}


		//find first paid user in DB with mailing queued
		foreach ($queuedMailings as $queuedMailing)
		{
			$sender = User::where('id', $queuedMailing->user_id)->get()->first();
			if ($sender->isUpgraded())
			{
				$nextMailing = $queuedMailing;
				$nextSender = $sender;
				break;
			}
		}
		//no paid users, get next in line user
		if (!isset($nextSender) && !isset($nextMailing))
		{
			$nextMailing = $queuedMailings[0];
			$nextSender = User::where('id', $queuedMailings[0]->user_id)->get()->first();
		}

		//send it off to the job queue for sending
		dispatch(new SendsMail($nextSender, $nextMailing));
	}




}