<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\Campaigns;
use App\Helpers\Downline;
use Illuminate\Http\Request;

class GrowYourDownlineController extends Controller
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
	* show the reftools page
	*
	* @return void
	*/
	public function reftools()
	{

		return View('members.reftools');
	}


	/**
	* show the downline page
	*
	* @return void
	*/
	public function downline()
	{
		return View('members.downline');
	}



	/**
	* show the downline page for a specific lv
	*
	* @return void
	*/
	public function showDownlineLv($lv)
	{
		// if ($lv > config('listjoe.max_level') || $lv < 1)
		// 	return 'invalid url!';

		$user = Auth::user();

		$downline = (new Downline())->getDownline($user, 0);
		$referrals = isset($downline[$lv]) ? $downline[$lv] : [];

		return View('members.downline-detail',compact('user','referrals','lv'));
	}







	/**
	* show the affiliate statistics page
	*
	* @return void
	*/
	public function affiliateStats()
	{
		$campaigns = Campaigns::where('affiliate_id', Auth::user()->id)->get()->all();

		return View('members.affiliatestat', compact('campaigns'));
	}
}
