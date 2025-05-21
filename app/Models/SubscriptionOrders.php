<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubscriptionOrders extends Model
{
    /** @use HasFactory<\Database\Factories\SubscriptionOrdersFactory> */
    use HasFactory;

     protected $fillable = [
        'user_id',
        'membership_id',
        'sponsor_id',
        'price',
        'checkout_session_id',    
        'ends_at'
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
