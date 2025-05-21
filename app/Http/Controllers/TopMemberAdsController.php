<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\TopMemberAds;
use App\Models\SpotlightAds;
use Illuminate\Http\Request;

class TopMemberAdsController extends Controller
{

	/**
	* create a new Controller Instance
	*
	* @return void
	*/
	public function __construct()
	{
		// $this->middleware('auth');
		// $this->middleware('member.ads');
	}



	/**
	* show edit profile page
	*
	* @return void
	*/
	public function topMemberAds()
	{
		$topMemberAd = TopMemberAds::where('user_id', Auth::user()->id)->get()->first();

		return Auth::user()->isUpgraded('silver') ? View('members.topmemberads', compact('topMemberAd')) : View('members.topmemberads-free');
	}


	/**
	* update the profile
	*
	* @return void
	*/
	public function update(Request $request)
	{
		$topMemberAd = TopMemberAds::where('user_id', Auth::user()->id)->get()->all();

		if($request->operation == 'update')
			return $this->resetCount($topMemberAd[0]);
		elseif ($request->operation == 'remove' || count($topMemberAd) > 1)
			return $this->removesTopMemberAds($request);

		$validatedData = $request->validate([
			'title' => 'required|string|max:20',
			'desc1' => 'required|string|max:35',
			'desc2' => 'required|string|max:35',
			'url' => 'required|url|max:500'
		]);

		if (count($topMemberAd) == 1)
		{
			$topMemberAd[0]->headline = $request->title;
			$topMemberAd[0]->body1 = $request->desc1;
			$topMemberAd[0]->body2 = $request->desc2;
			$topMemberAd[0]->url = $request->url;
			$topMemberAd[0]->save();

			return redirect('members/topmemberads')->with('message', 'You have successfully updated your topmember ad.');
		}
		else
		{
			$topMemberAd = new TopMemberAds();
			$topMemberAd->user_id = Auth::user()->id;
			$topMemberAd->headline = $request->title;
			$topMemberAd->body1 = $request->desc1;
			$topMemberAd->body2 = $request->desc2;
			$topMemberAd->url = $request->url;
			$topMemberAd->save();

			return redirect('members/topmemberads')->with('message', 'You have successfully entered a new topmember ad into the system.');
		}


	}


	/**
	* Remove all topmember ads by a user
	* technically, user should have only one
	* but why not "all" just in case
	*
	* @return res[pmse]
	*/
	public function removesTopMemberAds(Request $request)
	{
		$topMemberAds = TopMemberAds::where('user_id', Auth::user()->id)->get()->all();

		if(isset($topMemberAds))
		{
			foreach($topMemberAds as $topMemberAd)
				$topMemberAd->delete();

			return redirect('members/topmemberads')->with('message', 'You have succesfully removed your spotlight ad.');
		}
		else
			redirect('members/topmemberads')->with('message', 'Unexpected Error. Please try again.');
	}




	/**
	* reset the ad's click count
	*
	* @return res[pmse]
	*/
	public function resetCount(TopMemberAds $topMemberAd)
	{
		$topMemberAd->views	 = 0;
		$topMemberAd->clicks = 0;
		$topMemberAd->save();

		return redirect('members/topmemberads')->with('message', 'You have reset your click count and time since date.');
	}




	/**
	* count the click and go to url
	*
	* @return void
	*/
	public function countClick(int $id)
	{
		$topMemberAd = TopMemberAds::countClick($id);

		return redirect()->away($topMemberAd->url);

	}
}
