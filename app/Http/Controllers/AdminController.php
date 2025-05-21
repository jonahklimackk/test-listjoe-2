<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Helpers\SendsAMailingWithoutJobs;

class AdminController extends Controller
{

	//have to make this an auth eh




    /**
	* create a new Controller Instance
	*
	* @return void
	*/
	public function showManualMailing()
	{
		return view('admin.sendmail');
	}



    /**
	* create a new Controller Instance
	*
	* @return void
	*/
	public function processMailing($from, $to, $sort)
	{
		SendsAMailingWithoutJobs::chooseMailing($from, $to, $sort);
	}



}
