<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, Mandrill, and others. This file provides a sane
    | default location for this type of information, allowing packages
    | to have a conventional place to find your various credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
    ],

    'ses' => [
        'key' => env('SES_KEY'),
        'secret' => env('SES_SECRET'),
        'region' => 'us-east-1',
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],
    'facebook' => [
    'client_id' => '526002970928396',
    'client_secret' => 'f8b8f16b53d4249fcf4fa438795dc792',
    'redirect' => 'http://localhost:8000/admin/callback/',
    ],
    'twitter' => [
        'client_id' => 'VdpMTlioIM9Kvlb7vR1OMUWEz',
        'client_secret' => 'guXLMu0muxveXxrK8oAn7T98ULezZDd6EyyMGAzjj5Tk8StqnM',
        'redirect' => 'http://localhost:8000/autho/callback',
     ],
    'google' => [
        'client_id' => '397672928289-tg8unonu7n2ibek0pmrcr1k2r5dckefd.apps.googleusercontent.com',
        'client_secret' => '4MmrU6TxwkI6UoGGRbnSGcnw',
        'redirect' => 'http://localhost:8000/autho/callback/google/',
    ],
    'linkedin' => [
        'client_id'  =>  '81yrki5u107iym',
        'client_secret'  =>  'HAsIBEjC9AX5OKOk',
        'redirect'   =>  'http://localhost:8000/autho/callback/linkedin',
        'scope' => 'r_basicprofile r_emailaddress r_contactinfo r_fullprofile',
    ],
    'sparkpost' => [
    'secret' => '8f8bea26a78c065a625523c0331f1297e3bd0c67',
    ],
];
