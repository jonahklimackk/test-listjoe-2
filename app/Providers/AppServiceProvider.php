<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Models\TopMemberAds;
use App\Models\SpotlightAds;
use View;
use Auth; 

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
        // $topMemberAds = TopMemberAds::get(2);            

        // $spotLightAds = SpotlightAds::get(4);
        // dd(Auth::user()->id);
        // $topMemberAds = TopMemberAds::where('user_id',Auth::user()->id)->get()->all();
        // dd($topMemberAds);
        // $spotLightAds = SpotlightAds::where('user_id',Auth::user()->id)->get()->all();
        // View::share($topMemberAds);
        // View::share(compact('spotLightAds'));
        // $topMemberAds = TopMemberAds::take(2)->get()->all();
        // dd($topMemberAds);
        // dd($topMemberAds);


        // $topMemberAds = TopMemberAds::where('user_id',Auth::user()->id)->get()->all();
        // $spotLightAds = SpotlightAds::where('user_id',Auth::user()->id)->get()->all();



        // $topMemberAds = TopMemberAds::where('user_id',Auth::user()->id)->get()->all();
        // $spotLightAds = SpotlightAds::where('user_id',Auth::user()->id)->get()->all();
// View::share('key1', 'value1');


       // $topMemberAds = TopMemberAds::fetch(2);

       //  $spotLightAds = SpotlightAds::fetch(4);

       //  View::share('topMemberAds', compact('topMemberAds'));
       //      View::share('spotLightAds', compact('spotLightAds'  ));

    }
}
