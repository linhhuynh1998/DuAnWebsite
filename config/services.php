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
        'region' => env('SES_REGION', 'us-east-1'),
    ],

    'sparkpost' => [
        'secret' => env('SPARKPOST_SECRET'),
    ],

    'stripe' => [
        'model' => App\Models\User::class,
        'key' => env('STRIPE_KEY'),
        'secret' => env('STRIPE_SECRET'),
    ],

    'facebook' => [
        'client_id' => '433395004373467',
        'client_secret' => '6cc30fe806c27e99694715e91ec24ace',
        'redirect' => 'https://www.sanphamvinhlong.com/callback/facebook',
    ],

    'google' => [
        'client_id' => '638648101486-nccm951linc8aqqp3fd5nirgom8bcf53.apps.googleusercontent.com',
        'client_secret' => 'HVJHv5FiBg44C-JpUR-HXBjs',
        'redirect' => 'https://www.sanphamvinhlong.com/callback/google',
    ],

];
