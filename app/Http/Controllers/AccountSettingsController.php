<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Validator;

class AccountSettingsController extends Controller
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
	* show settings page
	*
	* @return void
	*/
	public function settings()
	{
		$user = Auth::user();

		return View('members.settings',compact('user'));
	}


	/**
	* update the settings
	*
	* @return void
	*/
	public function update(Request $request)
	{
		$user = Auth::user();

		$validatedData = $request->validate([
			// 'first_name' => 'required|string|max:100',
			// 'last_name' => 'string|max:100',
			'email' => 'required|string|email|max:255|unique:users',
			'email' => [
				'required',
				Rule::unique('users')->ignore($user->id),
			],
			'list_email' => 'required|string|email|max:255|unique:users',
			'list_email' => [
				'required',
				Rule::unique('users')->ignore($user->id),
			],
			'password' => 'required|string|min:6|max:100|confirmed',
			'password_confirmation' => 'required|string|min:6|max:100'
		]);

		if ($request->password && $request->password_confirmation)
		{
			$user->first_name = $request->first_name;
			$user->last_name = $request->last_name;
			$user->email = $request->email;
			$user->list_email = $request->list_email;
			if (is_null($request->paypal_email))
				$user->paypal_email = 0;
			else
				$user->paypal_email = $request->paypal_email;
			$user->save();

			//get fresh copy
			$user = Auth::user();
			return Redirect('/members/settings/')->with('message', 'You have successfully updated your account settings.');
		}
		else
			return view('members.settings', compact('user'))->with('message', 'You must enter your password and password combination if you want to make changes to your account.');

	}



}
