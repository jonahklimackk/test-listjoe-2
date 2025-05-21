<?php

namespace App\Http\Controllers;

use Auth;
use Redirect;
use App\Models\LoginAd;
use Illuminate\Http\Request;

class LoginAdsController extends Controller
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
	public function loginAds($edit)
	{
		$loginAd = LoginAd::where('user_id', Auth::user()->id)->get()->first();

		return Auth::user()->isUpgradedToAtLeast('gold') ? view('members.loginads',compact('loginAd','edit')) : view('members.loginads-free');
	}


	/**
	* update the profile
	*
	* @return void
	*/
	public function update(Request $request)
	{

		$loginAd = LoginAd::where('user_id', Auth::user()->id)->get()->all();

		if($request->operation == 'update')
			return $this->resetCount($loginAd[0]);
		elseif ($request->operation == 'remove' || count($loginAd) > 1)
			return $this->removesLoginAds($request);

		$validatedData = $request->validate([
			'headline' => 'required|string|max:500',
			'text' => 'required|string|max:50000',
			'link' => 'required|url|max:500'
		]);

		if (count($loginAd) == 1)
		{			
			$loginAd[0]->headline = $request->headline;
			$loginAd[0]->body = $request->text;
			$loginAd[0]->url = $request->link;
			$loginAd[0]->save();

			//after updating ad, should count be restored to 0?

			return redirect('members/loginads/edit/0')->with('message', 'You have successfully updated your login ad.');
		}
		else
		{
			$loginAd = new LoginAd();
			$loginAd->user_id = Auth::user()->id;
			$loginAd->headline = $request->headline;
			$loginAd->body = nl2br($request->text);
			$loginAd->url = $request->link;
			$loginAd->save();

			return redirect('members/loginads/edit/0')->with('message', 'You have successfully entered a new login ad into the system.');
		}


	}




	/**
	* removethe login ad for this user
	*
	* @return void
	*/
	public function delete()
	{
		$loginAds = LoginAd::where('user_id', Auth::user()->id)->get()->all();

		foreach($loginAds as $loginAd)
			$loginAd->delete();

		return redirect('members/loginads/edit/0')->with('message', 'You have successfully deleted your login ad.');
	}






	/**
	* redirect to form (made integrating easier)
	*
	* @return void
	*/
	public function redirect()
	{
		return Redirect::to('/members/loginads/edit/0');
	}



	/**
	* Show the login ad for members
	*
	* @return void
	*/
	public function showLoginAd()
	{
		$loginAd = LoginAd::where('user_id', '!=', Auth::user()->id)->get()->random(1)->first();

		if(is_null($loginAd))
			Redirect::to('/members');

		LoginAd::recordView($loginAd);
		// $credits = LoginAd::giveCredits(Auth::user());

		return view('members.show-loginad',compact('loginAd'));

		// return view('members.show-loginad',compact('loginAd'))->with('message','You have earned '.$credits.'credits.');
	}


	/**
	* Show a preview of the login ad
	*
	* @return void
	*/
	public function previewLoginAd()
	{
		$loginAd = LoginAd::where('user_id', Auth::user()->id)->get()->random(1)->first();

		if(is_null($loginAd))
			Error::handle("Can't preview an ad that isn't defined yet!");

		return view('members.preview-loginad',compact('loginAd'));
	}





	/**
	* count the click and go to url
	*
	* @return void
	*/
	public function countClick(int $id)
	{
		$loginAd = LoginAd::countClick($id);

		//what if earned credits hereKF

		return redirect()->away($loginAd->url);

	}
}
