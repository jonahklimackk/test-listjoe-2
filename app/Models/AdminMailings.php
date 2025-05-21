<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AdminMailings extends Model
{
    //



     /**
     * get user through mailing object
     *
     * @return integer
     */
     public function user()
     {
        return $this->belongsTo(User::class);
    }
}
