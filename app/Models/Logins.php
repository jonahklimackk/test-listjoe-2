<?php

namespace App\Models;

use Request;
use Illuminate\Database\Eloquent\Model;

class Logins extends Model
{
    //
    	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	//protected $fillable = [];

	/**
	 * The attributes that should be hidden for arrays.
	 *
	 * @var array
	 */
	/*protected $hidden = [];*/


	/**
	 * The attributes that aren't mass assignable
	 * acts as a blacklist, not whitelist, so all others included
	 *
	 * @var array
	 */
	protected $guarded = ['id'];


       /**
     * Eloquent relationship
     *
     * @return array
     */
       public function user()
       {
        return $this->belongsTo('App\Models\User');
       }


    /**
     * Record the login
     *
     * @return integer
     */
    public static function recordLogin(User $user, $request)
    {
    	Logins::create([
    		'user_id' => $user->id,
    		'ip' => $request->ip(),
    		'user_agent' => $request->userAgent()
    	]);



    }





}
