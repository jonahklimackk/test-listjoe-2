<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SupportTickets extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'name','email','subject','message'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'id'
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
