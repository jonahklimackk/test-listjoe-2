<?php

namespace App\Http\Middleware;

use Closure;
use View;
use Auth;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\TopMemberAds;
use App\Models\SpotlightAds;

class MemberAds
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // if (Auth::user())
        // {
        //     $topMemberAds = TopMemberAds::where('user_id',Auth::user()->id)->get()->all();
        //     $spotLightAds = SpotlightAds::where('user_id',Auth::user()->id)->get()->all();
        // // $topMemberAds = TopMemberAds::get(2);
        //     View::share(compact('topMemberAds'));

        // // $spotLightAds = SpotlightAds::get(4);
        //     View::share(compact('spotLightAds'));
        // }

// dd(Auth::user());


            return $next($request);
        }
    }
