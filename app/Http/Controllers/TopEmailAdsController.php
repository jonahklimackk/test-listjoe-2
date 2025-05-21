<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\TopEmailAd;
use Illuminate\Http\Request;

class TopEmailAdsController extends Controller
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
	* show add/edit TopEmailAds page
	*
	* @return View
	*/
	public function topEmailAds()
	{
		$topEmailAd = TopEmailAd::where('user_id', Auth::user()->id)->get()->first();

		return Auth::user()->isUpgraded() ? view('members.topemailads', compact('topEmailAd')) : view('members.topemailads-free');
	}


	/**
	* update the profile
	*
	* @return void
	*/
	public function update(Request $request)
	{
		$topEmailAd = TopEmailAd::where('user_id', Auth::user()->id)->get()->all();

		if($request->operation == 'update')
			return $this->resetCount($topEmailAd[0]);
		elseif ($request->operation == 'remove' || count($topEmailAd) > 1)
			return $this->removesTopEmailAds($request);

		$validatedData = $request->validate([
			'title' => 'required|string|max:20',
			'desc1' => 'required|string|max:35',
			'desc2' => 'required|string|max:35',
			'url' => 'required|url|max:500'
		]);

		if (count($topEmailAd) == 1)
		{
			$topEmailAd[0]->headline = $request->title;
			$topEmailAd[0]->body1 = $request->desc1;
			$topEmailAd[0]->body2 = $request->desc2;
			$topEmailAd[0]->url = $request->url;
			$topEmailAd[0]->save();

			return redirect('members/topemail')->with('message', 'You have successfully updated your top email ad.');
		}
		else
		{
			$topEmailAd = new TopEmailAd();
			$topEmailAd->user_id = Auth::user()->id;
			$topEmailAd->headline = $request->title;
			$topEmailAd->body1 = $request->desc1;
			$topEmailAd->body2 = $request->desc2;
			$topEmailAd->url = $request->url;
			$topEmailAd->save();

			return redirect('members/topemail')->with('message', 'You have successfully entered a new top email ad into the system.');
		}


	}



	/**
	* Remove all top email ads by a user
	* technically, user should have only one
	* but why not "all" just in case
	*
	* @return res[pmse]
	*/
	public function removesTopEmailAds(Request $request)
	{
		$topEmailAds = TopEmailAd::where('user_id', Auth::user()->id)->get()->all();

		if(isset($topEmailAds))
		{
			foreach($topEmailAds as $topEmailAd)
				$topEmailAd->delete();

			return redirect('members/topemail')->with('message', 'You have succesfully removed your spotlight ad.');
		}
		else
			redirect('members/topemail')->with('message', 'Unexpected Error. Please try again.');
	}


	/**
	* reset the ad's click count
	*
	* @return res[pmse]
	*/
	public function resetCount(TopEmailAd $topEmailAd)
	{
		$topEmailAd->clicks = 0;
		$topEmailAd->save();

		return redirect('members/topemail')->with('message', 'You have reset your click count and time since date.');
	}




    /**
    * record a click for top email ad
    *
    * @return void
    */
    public function countClick($id)
    {

    	$topEmailAd = TopEmailAd::find($id);
    	if ($topEmailAd){
    		$topEmailAd->clicks++;
    		$topEmailAd->save();  
    		return redirect()->away($topEmailAd->url);              
    	}

    	return redirect('/');
    }


    /**
    * record a view for top email ad
    *
    * @return string
    */
    public function recordView($id)
    {

    	$topEmailAd = TopEmailAd::find($id);
    	if ($topEmailAd){
    		$topEmailAd->views++;
    		$topEmailAd->save();                
    	}

    	return '/img/spotlights_ads_star.png';


    }


}
