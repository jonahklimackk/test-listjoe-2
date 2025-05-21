<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class VacationModeController extends Controller
{
   	/**
	* create a new Controller Instance
	*
	* @return void
	*/
	public function __construct()
	{
		$this->middleware('auth');
	}

	/**
	*
	*
	* @return void
	*/
	public function sendConfirmationOrFlipStatus()
	{
		if (Auth::user()->status == 'active')
			return Auth::user()->status = 'vacation_mode';
		elseif(Auth::user()->status == 'vacation_mode')
			return Auth::user()->sendActivationLink()
	}

}
