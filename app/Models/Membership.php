<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Membership extends Model
{
    /**
     * Indicates if the IDs are auto-incrementing.
     *
     * @var bool
     */
    public $incrementing = true;

        /**
         * Eloquent relationship
         *
         * @return
         */
        public function users()
        {
            return $this->hasMany('App\Models\Users');
        }
}
