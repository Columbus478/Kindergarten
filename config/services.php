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
     'client_id' => '1049555091760009',
     'client_secret' => 'c035057640b8622ed948b727009a2e3b',
     'redirect' => 'http://kindergarten.dev/social/callback/facebook',
    ],

    'google' => [
     'client_id' => '156764114041-57nb6tig82ajrtr9dn8cleivrqclmg97.apps.googleusercontent.com',
     'client_secret' => '7AGXOoPYbcNNzvaSu6XYw9sE',
     'redirect' => 'http://kindergarten.dev/social/callback/google',
    ],

];
