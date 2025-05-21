<?php

namespace App\Http\Controllers;

use Auth;
use Cookie;
use App\Models\Analytics;
use Illuminate\Http\Request;
use App\Helpers\AffiliateTracker;

class AffiliateTrackingController extends Controller
{


	/**
	* The visitor came from /
	*
	* @return void
	*/
	public function index()
	{
		//because i wnat to trck visitors to /
		Analytics::countClick('/');

		AffiliateTracker::clickedHome();

		// exit;
		return view('sales.index');
	}

    /**
	*
	*
	* @return void
	*/
	public function aff($affiliateUsername)
	{
		AffiliateTracker::clickedAff($affiliateUsername);

		// exit;
		return view('sales.index');
	}


    /**
	*
	*
	* @return void
	*/
	public function affAndCampaign($affiliateUsername, $campaign)
	{

		AffiliateTracker::clickedAffCampaign($affiliateUsername, $campaign);

		// exit;
		return view('sales.index');
	}


   /**
	*
	*
	* @return void
	*/
	public function debug()
	{
		dump('aff cookie: '.Cookie::get('aff'));
		dump('campaign cookie: '.Cookie::get('campaign'));
		dump(Cookie::get('user'));
		dump(Auth::user());
	}

}
