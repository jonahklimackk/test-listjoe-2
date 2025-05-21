<?php

namespace App\Http\Controllers;

use View;
use Auth;
use Carbon\Carbon;
use App\Models\SpotlightAds;
use App\Models\TopMemberAds;
use Illuminate\Http\Request;

class SpotlightAdsController extends Controller
{

	/**
	* create a new Controller Instance
	*
	* @return void
	*/
	public function __construct()
	{
		// $this->middleware('auth');
		// $this->middleware('member.ads 	');/**/
	}



	/**
	* show edit profile page
	*
	* @return void
	*/
	public function spotlight()
	{

		$spotlightAd = SpotLightAds::where('user_id', Auth::user()->id)->get()->first();


		return Auth::user()->isUpgraded() ? View('members.spotlight',compact('spotlightAd')) : View('members.spotlight-free');
	}


	/**
	* update the profile
	*
	* @return void
	*/
	public function update(Request $request)
	{
		$spotlightAd = SpotLightAds::where('user_id', Auth::user()->id)->get()->all();

		if($request->operation == 'update')
			return $this->resetCount($spotlightAd[0]);
		elseif ($request->operation == 'remove' || count($spotlightAd) > 1)
			return $this->removesSpotlightAds($request);

		$validatedData = $request->validate([
			'title' => 'required|string|max:20',
			'desc1' => 'required|string|max:35',
			'desc2' => 'required|string|max:35',
			'url' => 'required|url|max:500'
		]);

		if (count($spotlightAd) == 1)
		{
			$spotlightAd[0]->headline = $request->title;
			$spotlightAd[0]->body1 = $request->desc1;
			$spotlightAd[0]->body2 = $request->desc2;
			$spotlightAd[0]->url = $request->url;
			$spotlightAd[0]->save();

			return redirect('members/spotlight')->with('message', 'You have successfully updated your spotlight ad.');
		}
		else
		{
			$newSpotlightAd = new SpotLightAds();
			$newSpotlightAd->user_id = Auth::user()->id;
			$newSpotlightAd->headline = $request->title;
			$newSpotlightAd->body1 = $request->desc1;
			$newSpotlightAd->body2 = $request->desc2;
			$newSpotlightAd->url = $request->url;
			$newSpotlightAd->save();

			return redirect('members/spotlight')->with('message', 'You have successfully entered a new spotlight ad into the system.');
		}



	}





	/**
	* Remove all spotlight ads by a user
	* technically, user should have only one
	* but why not "all" just in case
	*
	* @return res[pmse]
	*/
	public function removesSpotlightAds(Request $request)
	{
		$spotlightAds = SpotlightAds::where('user_id', Auth::user()->id)->get()->all();

		if(isset($spotlightAds))
		{
			foreach($spotlightAds as $spotlightAd)
				$spotlightAd->delete();

			return redirect('members/spotlight')->with('message', 'You have succesfully removed your spotlight ad.');
		}
		else
			redirect('members/spotlight')->with('message', 'Unexpected Error. Please try again.');
	}




	/**
	* reset the ad's click count
	*
	* @return res[pmse]
	*/
	public function resetCount(SpotlightAds $spotlightAd)
	{
		$spotlightAd->views = 0;
		$spotlightAd->clicks = 0;
		$spotlightAd->save();

		return redirect('members/spotlight')->with('message', 'You have reset your click count and time since date.');
	}




	/**
	* count the click and goto url
	*
	* @return void
	*/
	public function countClick(int $id)
	{
		$spotLightAd = SpotlightAds::countClick($id);

		return redirect()->away($spotLightAd->url);

		// return redirect('members/topmemberad')->with('message', 'You have reset your click count and time since date.');
	}

}
