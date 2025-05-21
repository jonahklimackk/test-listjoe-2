<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Login the user and show the support dashboard
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return redirect('/members');
    }
}
