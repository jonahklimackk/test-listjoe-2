<?php

namespace App\Http\Controllers;

use App\Mailing;
use Illuminate\Support\Str;
use App\Helpers\Mailer\Calf;
use Illuminate\Http\Request;
use App\Helpers\Mailer\Segment;
use App\Helpers\Mailer\Campaign;
use App\Helpers\Mailer\Subscriber;
use App\Helpers\Mailer\MailingList;
use App\Helpers\Mailer\CommonCalls;

class TestController extends Controller
{

	/**
	* Test creating a mailing list
	*
	* @return int
	*/
	public function calf()
	{
		// $calf = (new Calf('calftest'))->testSendMailing();

		// $calf = new Calf();

		// dd($calf->testSendMailing());


		$campaign = Campaign::create('jonah','subject line','jonahkl11k@gmail.com', 'jonahkl11k@gmail.com');
		dump('camapaign creation result');
		dd($campaign);

	}



}
