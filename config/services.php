<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Stripe, Mailgun, SparkPost and others. This file provides a sane
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
        'app_id' => env('1562513950484664'),
        'client_id' => env('1562513950484664'),
        'client_secret' => env('aa1d8a6d709b87982c7d41fed45cdbaf'),
        'redirect' => env('http://localhost:8000/login/facebook/callback'),
    ],

    'github' => [
        'client_id' => env('your-github-app-id'),
        'client_secret' => env('your-github-app-secret'),
        'redirect' => env('http://your-callback-url'),
    ],

];
