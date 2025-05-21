<?php

namespace App\Models;

use Auth;
use DB;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Analytics extends Model
{

    /**
    * counts clicks to path specifid /
    *
    * @return void
    */
    public static function countClick($routePath)
    {
        $analytics = DB::table('analytics')->where('route', $routePath)->get()->all();

        if (!count($analytics)) 
        {
            DB::table('analytics')->insert([
                'route' => $routePath,
                'clicks' => 1
            ]);            
        }
        else 
        {
            $clicks = $analytics[0]->clicks + 1;
            DB::table('analytics')->where('route', $routePath)->update(['clicks' => $clicks]);
        }


    }
}



 