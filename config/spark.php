<?php

use App\Models\User;

return [

    /*
    |--------------------------------------------------------------------------
    | Spark Path
    |--------------------------------------------------------------------------
    |
    | This configuration option determines the URI at which the Spark billing
    | portal is available. You are free to change this URI to a value that
    | you prefer. You shall link to this location from your application.
    |
    */

    'path' => 'billing',

    /*
    |--------------------------------------------------------------------------
    | Spark Middleware
    |--------------------------------------------------------------------------
    |
    | These are the middleware that requests to the Spark billing portal must
    | pass through before being accepted. Typically, the default list that
    | is defined below should be suitable for most Laravel applications.
    |
    */

    'middleware' => ['web', 'auth'],

    /*
    |--------------------------------------------------------------------------
    | Branding
    |--------------------------------------------------------------------------
    |
    | These configuration values allow you to customize the branding of the
    | billing portal, including the primary color and the logo that will
    | be displayed within the billing portal. This logo value must be
    | the absolute path to an SVG logo within the local filesystem.
    |
    */

    'brand' =>  [
        'logo' => realpath(__DIR__.'/public/img/listjoeheadsmall.jpg'),
        'color' => 'bg-gray-800',
    ],

    /*
    |--------------------------------------------------------------------------
    | Proration Behavior
    |--------------------------------------------------------------------------
    |
    | This value determines if charges are prorated when making adjustments
    | to a plan such as incrementing or decrementing the quantity of the
    | plan. This also determines proration behavior if changing plans.
    |
    */

    'prorates' => true,

    /*
    |--------------------------------------------------------------------------
    | Spark Date Format
    |--------------------------------------------------------------------------
    |
    | This date format will be utilized by Spark to format dates in various
    | locations within the billing portal, such as while showing invoice
    | dates. You should customize the format based on your own locale.
    |
    */

    'date_format' => 'F j, Y',

    /*
    |--------------------------------------------------------------------------
    | Spark Billables
    |--------------------------------------------------------------------------
    |
    | Below you may define billable entities supported by your Spark driven
    | application. The Paddle edition of Spark currently only supports a
    | single billable model entity (team, user, etc.) per application.
    |
    | In addition to defining your billable entity, you may also define its
    | plans and the plan's features, including a short description of it
    | as well as a "bullet point" listing of its distinctive features.
    |
    */
 'billables' => [

        'user' => [
            'model' => User::class,

            'trial_days' => 5,

            'default_interval' => 'monthly',

            'plans' => [
                [
                    'name' => 'Bronze',
                    'short_description' => 'Dip your toes into the water with our affordable Bronze plan.',
                    'monthly_id' => env('SPARK_STANDARD_MONTHLY_PLAN', 'price_1QKmHz2Ntj6fOFXz6HVaUDCR'),
                    'yearly_id' => env('SPARK_STANDARD_YEARLY_PLAN', 'price_1QKmUd2Ntj6fOFXzWCwI2GHo'),
                    'features' => [
                        'Send email to 500 Listjoe members every day',
                        'Place Top Member Ads and Sponsor Ads',
                        'No Ads in your emails',                        
                    ],
                ],
                 [
                    'name' => 'Silver',
                    'short_description' => 'Check out our silver benefists',
                    'monthly_id' => env('SPARK_STANDARD_MONTHLY_PLAN', 'price_1QKmMT2Ntj6fOFXzR2o6xefs'),
                    'yearly_id' => env('SPARK_STANDARD_YEARLY_PLAN', 'price_1QKmTH2Ntj6fOFXz3y0ju3xt'),
                    'features' => [
                        'Send email to 1500 Listjoe members every day.',
                        'Place Top Member Ads and Sponsor Ads',
                        'No Ads in your emails',    
                    ],
                ],
                [
                    'name' => 'Gold',
                    'short_description' => 'This is a short, human friendly description of the plan.',
                    'monthly_id' => env('SPARK_STANDARD_MONTHLY_PLAN', 'price_1QKmOG2Ntj6fOFXzbu7CzLEo'),
                    'yearly_id' => env('SPARK_STANDARD_YEARLY_PLAN', 'price_1QKmUz2Ntj6fOFXzzeOsa6y2'),
                    'features' => [
                        'Send email to 3000 Listjoe members every day',
                        'Place Top Member Ads and Sponsor Ads',
                        'No Ads in your emails',    
                        'You can create special Login deals for each member'
                    ],
                ],
            ],

        ],
    ],
];
