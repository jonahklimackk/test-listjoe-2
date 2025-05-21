<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SalesController extends Controller
{
    /**
     * show terms
     *
     * @return void
     */
    public function terms()
    {
        return View('sales.terms');
    }


     /**
     * show testimonials
     *
     * @return void
     */
    public function testimonials()
    {
        return View('sales.testimonials');
    }



     /**
     * show contact form
     *
     * @return void
     */
    public function contact()
    {
        return View('sales.contact');
    }



     /**
     * show registration form
     *
     * @return void
     */
    public function signup()
    {

    	return Redirect('/register');

    }

     /**
     * show privacy page
     *
     * @return void
     */
    public function privacy()
    {

        return View('sales.privacy');

    }



}
