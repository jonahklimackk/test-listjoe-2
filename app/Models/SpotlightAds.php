<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class SpotlightAds extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'headline', 'body1', 'body2', 'url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];


    /**
    * determine relationship
    *
    * @return boolean
    */
    public function user()
    {
    	return $this->belongsTo('App\Models\User');
    }



    /**
     * Return some ads, add +1 to views
     *
     * @return array
     */
    public static function fetch($numAds)
    {
        // if (Auth::user())
        return SpotLightAds::where('user_id', '!=', Auth::user()->id)->get()->take($numAds)->all();
    }




    /**
     * Count a view for the ad
     *
     * @param SpotLightAds
     * @return void
     */
    public static function recordView(SpotLightAds $spotLightAd)
    {
        $spotLightAd->views += 1;
        $spotLightAd->save();
    }




    /**
     * Count a click for the ad
     *
     * @param int $id
     * @return string $url
     */
    public static function countClick(int $id)
    {
        $spotLightAd = SpotlightAds::where('id',$id)->get()->first();
        $spotLightAd->clicks++;
        $spotLightAd->save();

        return $spotLightAd;

    }

}
