<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class RecommendedListbuildersController extends Controller
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
	* show the recommended listbuilders page
	*
	* @return void
	*/
	public function recommendedlb()
	{

		$user = Auth::user();


		return View('members.recommendedlb',compact('user'));
	}
}
