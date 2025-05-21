<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | This option controls the default mailer that is used to send all email
    | messages unless another mailer is explicitly specified when sending
        | the message. All additional mailers can be configured within the
        | "mailers" array. Examples of each type of mailer are provided.
    |
    */
'default' => "smtp1",
    // 'default' => "roundrobin",
    // 'default' => 'log',


/*
    |--------------------------------------------------------------------------
    | Mailer Configurations
    |--------------------------------------------------------------------------
    |
    | Here you may configure all of the mailers used by your application plus
    | their respective settings. Several examples have been configured for
    | you and you are free to add your own as your application requires.
    |
    | Laravel supports a variety of mail "transport" drivers that can be used
    | when delivering an email. You may specify which one you're using for
    | your mailers below. You may also add additional mailers if needed.
    |
    | Supported: "smtp", "sendmail", "mailgun", "ses", "ses-v2",
    |            "postmark", "resend", "log", "array",
    |            "failover", "roundrobin"
    |
    */

    'mailers' => [

        'mailgun' => [
            'transport' => 'mailgun',
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],



        //kaskas - contabo - THIS IS THE SLOW ONE
        'smtp1' => [
            'transport' => 'smtp',
            // 'url' => 'smtp://pmta.listjoe.com',  
            'host' => 'server1.listjoe.com',
            'port' => env('MAIL_PORT', 587),
            'encryption' => 'tls',
            'username' => 'smtp@listjoe.com',
            'password' => 'Hak$Tz)5)MI7bvSC',
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url(env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
        ], 
        //zeeshan - ovh cloud - THE FAST ONE
        'smtp2' => [
            'transport' => 'smtp',
            'url' => 'smtp://pmta.listjoe.com',
            'host' => 'pmta.listjoe.com',
            'port' => env('MAIL_PORT', '587'),
            'encryption' => env('MAIL_ENCRYPTION', 'tls'),
            'username' => 'info@listjoe.com',
            'password' => 'pass123',
            'timeout' => null,
            'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url(env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
        ],       

        // 'smtp' => [
        //     'transport' => 'smtp',
        //     'url' => env('MAIL_URL'),
        //     'host' => 'smtp-relay.brevo.com',
        //     'port' => env('MAIL_PORT', 587),
        //     'encryption' => env('MAIL_ENCRYPTION', 'tls'),
        //     'username' => '81e30c001@smtp-brevo.com',
        //     'password' => '8sGATPjt6CUw79La',
        //     'timeout' => null,
        //     'local_domain' => env('MAIL_EHLO_DOMAIN', parse_url(env('APP_URL', 'http://localhost'), PHP_URL_HOST)),
        // ],

        'ses' => [
            'transport' => 'ses',
        ],

        'postmark' => [
            'transport' => 'postmark',
            // 'message_stream_id' => env('POSTMARK_MESSAGE_STREAM_ID'),
            // 'client' => [
            //     'timeout' => 5,
            // ],
        ],

        'resend' => [
            'transport' => 'resend',
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => env('MAIL_SENDMAIL_PATH', '/usr/sbin/sendmail -bs -i'),
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],

        'failover' => [
            'transport' => 'failover',
            'mailers' => [
                'smtp',
                'log',
            ],
        ],

        'roundrobin' => [
            'transport' => 'roundrobin',
            'mailers' => [
                'smtp1',
                'smtp2',
            ],
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | You may wish for all emails sent by your application to be sent from
    | the same address. Here you may specify a name and address that is
    | used globally for all emails that are sent by your application.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'info@listjoe.com'),
        'name' => env('MAIL_FROM_NAME', 'Listjoe'),
    ],

];
