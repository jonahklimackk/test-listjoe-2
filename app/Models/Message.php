<?php

namespace App\Models;

use Auth;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
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
     * List messages with replies in proper order
     *
     * @param array $messages
     * @return array $newOrderMessages
     */
    public static function sortWithReplies($messages)
    {
        $sortedMessages = [];
        for ($i = 0; $i < count($messages); $i++)
        {
            $sortedMessages []= $messages[$i];

            $replies = Message::where('answer_id', $messages[$i]->id)->get()->all();

            $depthReplies = Message::sortWithReplies($replies);
            foreach($depthReplies as $reply)
                $sortedMessages []= $reply;
        }
        return array_unique($sortedMessages);
    }



    /**
     * How many messagese are unread (For display in profile block)
     *
     * @param array $messages
     * @return array $newOrderMessages
     */
    public static function unread()
    {
        return Message::where('to_user_id', Auth::user()->id)->get()->count();

    }
}
