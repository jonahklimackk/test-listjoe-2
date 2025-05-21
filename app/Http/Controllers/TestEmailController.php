<?php

namespace App\Http\Controllers;

use Mail;
use App\User;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use App\Helpers\SendsAMailing;

class TestEmailController extends Controller
{


	/**
	* test sending a single email
	*
	* @return void
	*/
	public function test()
	{
		Mail::to(User::find(2))->send(new TestMail);


		return 'yay';
	}




	/**
	* test sending a mailing
	*
	* @return void
	*/
	public function testSendMailing()
	{

		SendsAMailing::testViaWeb();

		return 'yay';
	}
}
