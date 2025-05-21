<?php


return [


    /*
    |--------------------------------------------------------------------------
    | max_level
    |--------------------------------------------------------------------------
    |
    | The amount of levels we calculate in downline
    |
    */

    'max_level' => 6,




    /*
    |--------------------------------------------------------------------------
    | Admin Id
    |--------------------------------------------------------------------------
    |
    | The Admin User, top of everyone's downline
    |
    */

    'admin_id' => 1,



    /*
    |--------------------------------------------------------------------------
    | max credits
    |--------------------------------------------------------------------------
    |
    | the lwoer upper range of credits given per action
    |
    */
    'lower_credits_bound' => 20,
    'upper_credits_bound' => 50,



    /*
    |--------------------------------------------------------------------------
    | Admin Username
    |--------------------------------------------------------------------------
    |
    | The Admin User, top of everyone's downline
    |
    */

    'admin_username' => 'listjoe',



    /*
    |--------------------------------------------------------------------------
    | The link to the member profile
    |--------------------------------------------------------------------------
    |
    | in ca se i wante to sned them somewhere else soemday i duunno
    |
    */

    'member_profile' => '/members/profile/u/',


        /*
    |--------------------------------------------------------------------------
    | links in emails prefix
    |--------------------------------------------------------------------------
    |
    | so I can test the credit mail email template    
    |
    */

    // 'email_url' => 'http://104.248.123.185',
    // 'email_url' => 'http://localhost:8000',
    'email_url' => env('APP_URL'),



    /*
    |--------------------------------------------------------------------------
    | Path To Backend Ad Clicks
    |--------------------------------------------------------------------------
    |
    | not sure I use this anymore
    |
    */

    'backend_ad_url' => '/ads/click/',


    /*
    |--------------------------------------------------------------------------
    | Credits For Actions
    |--------------------------------------------------------------------------
    |
    | ex: 500 credits for referring someone
    |
    */

    'referral_bonus' => 500,
    'signup_bonus' => 500,
    'sent_mail_bonus' => 100,
];