<?php

return [
    //View for enter the code.
    'view' => 'twofactor::verify',
    
    //Duration to expired verification code.
    'expire_duration' => 15,

    //Middleware group options.
    'middleware' => ['web', 'auth', 'twofactor'],
    'domain' => null,

    //Preferences settings.
    'preferences' => [
        'allow' => true,
        'view' => 'twofactor::preferences',
        'middleware' => ['web', 'auth', 'twofactor'],
        'domain' => null,
    ],

    'routes' => [
        //Name of route. This is route after expired code.
        'login' => 'login',

        //Name of route. This is route after successful logged in. For example admin page or dashboard.
        'successful' => 'home',

        //Name of route. This is route when you don't need to send again code. If you are logged in and you try to create two-factor code. For example start page.
        'return' => 'index'
    ]
];