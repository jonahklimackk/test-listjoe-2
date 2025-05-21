<?php

namespace App\Http\Controllers;


use Auth;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class TestimonialController extends Controller
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
	* show the testimonial input page
	*
	* @return void
	*/
	public function showTestimonial()
	{
		$testimonial = Testimonial::where('user_id', Auth::user()->id)->get()->first();
		return View('members.testimonial', compact('testimonial'));
	}

	/**
	*
	*
	* @return void
	*/
	public function update(Request $request)
	{
		$validatedData = $request->validate([
			'testimonial' => 'required|string',
		]);


		$testimonial = Testimonial::updateOrCreate(
			['user_id' => Auth::user()->id],
			['user_id' => Auth::user()->id,
			'testimonial' => $request->testimonial]
		);

		return Redirect('/members/testimonial/')->with('message', 'Thanks for your feedback! We really appreciate it. You can edit your testimonial anytime by updating this form.');
	}

}
