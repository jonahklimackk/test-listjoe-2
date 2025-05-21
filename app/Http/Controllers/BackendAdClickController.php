<?php

namespace App\Http\Controllers;

use Redirect;
use App\LoginAd;
use App\TopEmailAd;
use App\TopMemberAds;
use App\SpotlightAds;
use App\Helpers\Error;
use Illuminate\Http\Request;

class BackendAdClickController extends Controller
{

    /**
     * Record a click to a backend member ad and send to url
     *
     * @param Request $request
     * @param string $adType
     * @param int $id
     * @return void
     */
    public function handle(Request $request, $adType, $id)
    {
        $mappedAdTypesToModelNames = [
            'tma' => 'TopMemberAds',
            'spot' => 'SpotlightAds',
            'tea' => 'TopEmailAd',
            'la' => 'LoginAd',
        ];

        if (array_key_exists($adType, $mappedAdTypesToModelNames))
            $className = $mappedAdTypesToModelNames[$adType];
        else
            Error::handle('This ad type is not supported');

        $class = "App\\".$className;

        $backendAd = $class::where('id', $id)->get()->first();
        if (isset($backendAd))
        {
            $backendAd->clicks += 1;
            $backendAd->save();
        }
        else
            Error::handle("Can't find $className with id: $id");

        return Redirect::to($backendAd->url);
    }
}
