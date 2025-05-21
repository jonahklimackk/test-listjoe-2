<?php

namespace App\Http\Controllers;

use Auth;
use App\Models\User;
use App\Models\Message;
use App\Helpers\Error;
use App\Models\SocialProfile;

use Illuminate\Http\Request;

class ProfileController extends Controller
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
	* Show member's own profile page in account
	*
	* @return void
	*/
	public function showProfile()
	{
		$messages = Message::where('to_user_id',Auth::user()->id)->get()->all();
		$messages = Message::sortWithReplies($messages);

		$referrals = User::where('sponsor_id', Auth::user()->id)->get()->all();

		return View('members.profile',compact('referrals','messages'));
	}



	/**
	* show profile page to outside visitors
	*
	* @return void
	*/
	public function showProfileOutside($username)
	{
		$profileUser = User::where('username', $username)->get()->first();

		if (!$profileUser)
			return redirect('/');

		$messages = Message::where('to_user_id',$profileUser->id)->where('type','PUBLIC')->get()->all();
		$messages = Message::sortWithReplies($messages);
		$referrals = User::where('sponsor_id', $profileUser->id)->get()->all();

		return View('members.profile-outside',compact('referrals', 'profileUser','messages'));
	}


	/**
	* show edit photo page
	*
	* @return void
	*/
	public function showEditProfile()
	{
		$socialProfiles = SocialProfile::where('user_id', Auth::user()->id)->get()->first();
		// dd($socialProfiles);

		return View('members.editprofile',compact('socialProfiles'));
	}



	/**
	* show edit social links page
	*
	* @return void
	*/
	public function showEditSocialLinks()
	{
		$socialProfiles = SocialProfile::where('user_id', Auth::user()->id)->get()->first();
		// dd($socialProfiles);

		return View('members.edit-social-links',compact('socialProfiles'));
	}






	/**
	* update the psocial
	*
	* @return void
	*/
	public function update(Request $request)
	{
		$validatedData = $request->validate([
			'facebook' => 'max:200',
			'twitter' => 'max:200',
			'skype' => 'max:200',
		]);

		SocialProfile::where('user_id', Auth::user()->id)->delete();

		$socialProfile = SocialProfile::create([
			'user_id' => Auth::user()->id,
			'facebook' => $request->facebook,
			'twitter' => $request->twitter,
			'skype'=> $request->skype,
			'gravatar' => $request->gravatar,
		]);

		return Redirect('members/edit-social-links')->with('message','You have successfully updated your social profiles.');

	}



	/**
	* upload the avatar - doesnt' work on production
	* 
	* @return void
	*/
	public function upload(Request $request)	
	{

		$request->validate([

			'avatar' => 'required|image',

		]);



		$avatarName = time().'.'.$request->avatar->getClientOriginalExtension();

		$request->avatar->move(public_path('storage/profile-photos'), $avatarName);


		$user = Auth::user();
		$user->avatar = $avatarName;
		$user->save();
		// Auth::user()->update(['avatar'=>$avatarName]);
		// Auth::user()->save;

		return "/storage/profile-photos/".$avatarName;


		// return back()->with('success', 'Avatar updated successfully.');


	}












	public function store(Request $request)

	{

		$request->validate([

			'avatar' => 'required|image',

		]);

		

		$avatarName = time().'.'.$request->avatar->getClientOriginalExtension();

		$request->avatar->move(public_path('avatars'), $avatarName);

		

		Auth()->user()->update(['avatar'=>$avatarName]);

		

		return back()->with('success', 'Avatar updated successfully.');

	}



	

	
}