<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class SplashPageController extends Controller
{

    /**
	* handle people coming in from splash pages
	*
	* @return void
	*/
	public function splash($splashId, $sponsorUsername)
	{
		$affiliate = User::where('username', $sponsorUsername)->get()->first();

		//splash page +1 clicks
		// $splash = SplashPage::where('user_id', $affiliate->id)->get()->first();
		// $splash->clicks += 1;
		// $splash->save();

		//so user can see it in their campaigns
		return redirect('/aff/'.$affiliate->username.'/'.'splash'.$splashId);
	}
}
