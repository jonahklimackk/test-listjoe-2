<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use App\Helpers\Mailer\Mailer;
use App\Helpers\Mailer\Segment;
use App\Helpers\Mailer\Campaign;
use App\Helpers\Mailer\Subscriber;
use App\Helpers\Mailer\MailingList;
use App\Helpers\Mailer\SegmentFactory;
use App\Helpers\Mailer\CampaignFactory;
use App\Helpers\Mailer\MailingListFactory;
use App\Helpers\Mailer\BuildsMoosendApiCall;

class MoosendTestingController extends Controller
{
/**
	* Call a Moosend Api Function
	* and return the response
	*
	* @return int
	*/
	public static function test()
	{

	}


	/**
	* testing a dispath to a job
	*
	* @return int
	*/
	public static function testQueueCron()
	{

		// 1. get next mailing
		$nextMailing = new Mailer(Auth::User());
		dd($nextMailing);

		// if (is_object($nextMailing))
		// 	$nextMailingiling->update(['status' => 'processing']);
		// else
		// 	Error::handle('got unexpected result, no object returned by Mailer::next()');

		// 2. get mailing list
		$mailingList = MailingList::getTest();
		dump($mailingList);

		$result = Segment::get('test', $mailingList->ID);
		dd($result);



		// 3. add subscribers (one time)

		// $subscribers = self::buildTestList();
		// $result = Subscriber::addMany($mailingList->ID, $subscribers);

		// 4. create segment for this mailing somehow randomized subset
		$randName = 'test'.rand(1,10000);
		$segment = new SegmentFactory($mailingList->ID, $randName, 'All');

		 // Segment::create($mailingList->ID, '');


		dd($segment);


		//4. then destroy segment


		return;
	}



	/**
	* build a subcriber list
	*
	* @return arr
	*/
	public static function buildTestList()
	{

		for ($i = 0; $i < 50 ; $i++)
		{
			$subscribers[] = [
				'name' => 'JJ'.$i,
				'email' => 'jj'.$i.'@jjmail.com'
			];


		}

		return $subscribers;
	}

}
