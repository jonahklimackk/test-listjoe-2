<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class TopEmailAd extends Model
{
	    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',  'body1', 'body2', 'url'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * Eloquent relationship
     *
     * @return array
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

}
