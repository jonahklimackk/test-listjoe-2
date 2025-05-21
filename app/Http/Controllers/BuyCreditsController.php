<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class BuyCreditsController extends Controller
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
	* show buy credits page
	*
	* @return void
	*/
	public function show()
	{

		//skype product testing
		return View('members.upgrade.buy-credits-half-price');

		// return View('members.upgrade.buy-credits');
	}


/**
	* Show thank you page
	*
	* @return void
	*/
	public function thanks()
	{

		return View('members.thank-you');
	}


}
