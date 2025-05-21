<?php

namespace App\Models;

use Auth;
use Cookie;
use Gate;
use Carbon\Carbon; 
use Spark\Billable;
use App\Models\Logins;
use App\Helpers\Error;
use App\Models\Mailing;
use App\Models\Message;
use App\Models\Membership;
use Carbon\CarbonInterface;
use Illuminate\Contracts\Auth\MustVerifyEmail;  
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Jetstream\HasTeams;
// use Laravel\Jetstream\MustVerifyEmail;  
use Laravel\Sanctum\HasApiTokens;
use Laravel\Nova\Auth\Impersonatable;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;

    /** @use HasFactory<\Database\Factories\UserFactory> */
    use Impersonatable;
    use HasFactory;
    use HasProfilePhoto;
    use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;
    use Billable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'email',
        'password',
        'sponsor_id',
        'membership'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array<int, string>
     */
    protected $appends = [
        'profile_photo_url',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }


    /**
     * Determine if the user can impersonate another user.
     *
     * @return bool
     */
    public function canImpersonate()
    {
        return Gate::forUser($this)->check('viewNova');
    }

    /**
     * Determine if the user can be impersonated.
     *
     * @return bool
     */
    public function canBeImpersonated()
    {
        return true;
    }



    /**
    * find out if the user is upgraded to any level
    *
    * @param string $Membership
    * @return boolean
    */
    public function isUpgraded()
    {
        // dd($this->membership);
        return $this->membership != 'free' ? true : false;
    }


    /**
    * find out if the user is at least a certain level
    *  very useful for silver/bronze features etc
    *
    * @param string $atLeastMembershipName
    * @return boolean
    */
    public function isUpgradedToAtLeast($atLeastMembershipName)
    {   
        //I'm a genius

        $atLeastMembershipId = Membership::where('name',$atLeastMembershipName)->get()->first()->id;
        $thisMembershipId = Membership::where('name', Auth::user()->membership)->get()->first()->id;

        return $atLeastMembershipId > $thisMembershipId ? false : true;
    }


    /**
    * Get frequently referenced membership data
    *
    * @return array
    */
    public function getMembershipData()
    {
        $user = Auth::user();


    }



    /**
     * Eloquent relationship
     *
     * @return
     */
    public function membership()
    {
        return Membership::where('name',Auth::user()->membership)->get()->first();
    }






    /**
     * Calculates Rating
     * simpleversion
     *
     * @return
     */
    public function getRating()
    {


        /*
        Give them points based on activity in last 3 months
        login = +1
        mailing = +=2
        referral += 3
        a week passes with no login = -1
        a week passes with no mailing = -2
        a week passes with no referral = -3
        */

        //now i need a logins table, which is
        // $logins = Logins::where('user_id', $this->id)->get()->count();
        // $loginScore = $logins;


        // easy version

        $mailings = Mailing::where('user_id', $this->id)->get()->count();
        $mailingScore = $mailings * 2;

        $referrals = User::where('sponsor_id', $this->id)->get()->count();
        $referralScore = $referrals * 3;

        $totalScore = $mailingScore + $referralScore;


        return $totalScore = $totalScore > 100 ? 100 : $totalScore;
    }



    /**
     * Sends user re-activation links
     *
     * @return boolean
     */
    public function sendActivationLink()
    {
        Mail::to($user)->send(new ActivationLink($user));

    }


    /**
     * Figure out who the sponsor is at time of registration or fucking die
     *
     * @return boolean
     */
    public static function getSponsor()
    {
        $sponsor = Cookie::get('aff') ? User::where('username', Cookie::get('aff'))->get()->first() : User::find(config('listjoe.admin_id'));

        return isset($sponsor) ? $sponsor : die('no sponsor id contact support immediately');
    }





    /**
     * return how many personally sponsored (how many on lv 1)
     *
     * @return integer
     */
    public function getReferralCount(User $user)
    {
        // dd($user);
        return $user->where('sponsor_id',$user->id)->get()->count();
    }


      /**
     * get social profile through user
     *
     * @return integer
     */
      public function social()
      {
        return $this->hasOne('App\Models\SocialProfile');
    }


        /**
     * get messages through user object
     *
     * @return integer
     */
        public function subscriptionOrders()
        {
            return $this->hasMany('App\Models\SubscriptionOrders');
        }



        /**
     * get messages through user object
     *
     * @return integer
     */
        public function AdminMailings()
        {
            return $this->hasMany('App\Models\AdminMailings');
        }


      /**
     * get messages through user object
     *
     * @return integer
     */
      public function message()
      {
        return $this->hasMany('App\Models\Message');
    }


      /**
     * get support ticket throug huser object
     *
     * @return integer
     */
      public function supportTicket()
      {
        return $this->hasMany('App\Models\SupportTickets');
    }

     /**
     * get mailings through user object
     *
     * @return integer
     */
     public function mailing()
     {
        return $this->hasMany(Mailing::class);
    }



     /**
     * get login log
     *
     * @return integer
     */
     public function logins()
     {
        return $this->hasMany(Logins::class);
    }


     /**
     * returns num of unread msgs
     *
     * @return integer
     */
     public function unreadMessages()
     {

        return Message::where('to_user_id', Auth::user()->id)->get()->count();

    }


    /**
     * Get the user's sponsor
     * fixes values of null or 0 or missing user
     * sets them to admin account
     *
     * @return integer
     */
    public static function fetchSponsor($user)    
    {
        //finds all cases of bad sponsor id
        if($user->sponsor_id === 0 || 
            is_null($user->sponsor_id) || 
            is_null(User::where('id', $user->sponsor_id)->get()->first())){
            $user->sponsor_id = config('listjoe.admin_id');            
        }

        return User::where('id',$user->sponsor_id)->get()->first();

    }



     /**
     * can user send a mailing?
     *
     * @return boolean
     */
    // public function canSendMail()
    // {
    //     $newestMailingDate = Mailing::getLastMailing(Auth::user());

    //     $now = new Carbon();    

    //     // dump($now->day);

    //     // dd($newestMailingDate->day);


    //     return false;   
    // }



 }
