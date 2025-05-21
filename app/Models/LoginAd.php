<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LoginAd extends Model
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
     * Count a view for the ad
     *
     * @param LoginAd
     * @return void
     */
    public static function recordView(LoginAd $loginAd)
    {
        $loginAd->views += 1;
        $loginAd->save();
    }

    
    /**
     * Count a click for the ad
     *
     * @param int $id
     * @return string $url
     */
    public static function countClick(int $id)
    {
        $loginAd = LoginAd::where('id',$id)->get()->first();
        $loginAd->clicks++;
        $loginAd->save();

        return $loginAd;

    }

    /**
     * Give credits to the viewer
     *
     * @param User $user
     * @return void
     */
    public static function giveCredits(User $user)
    {
        //this is literraly the only place to edit
        //in cawe i change my mind or if there's a 
        //promotion or something
        $credits = rand(config('listjoe.lower_credits_bound'),config('listjoe.upper_credits_bound'));
        $user->credits += $credits;
        $user->save();
        
        return $credits;

    }



}
