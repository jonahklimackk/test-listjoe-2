<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController2 extends Controller
{
    /**
    * test sending a single email
    *
    * @return void
    */
    public function test()
    {
        // Mail::to(User::find(2))->send(new TestMail);


        return 'yay';
    }
}
