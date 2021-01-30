<?php

return [
    //View for enter the code.
    'view' => 'twofactor::twofactor',
    
    //Duration to expired verification code.
    'expire_duration' => 15,

    //Middleware for twofactor auth.
    'middleware' => ['auth', 'twofactor'],

    //Middleware allow for preferences.
    'allow_preferences' => true,
    
    //Middleware for routes preferences.
    'middleware_preferences' => ['auth', 'twofactor'],

    'routes' => [
        //Name of route. This is route after expired code.
        'login' => 'login',

        //Name of route. This is route after successful logged in. For example admin page or dashboard.
        'successful' => 'home',

        //Name of route. This is route when you don't need to send again code. If you are logged in and you try to create two-factor code. For example start page.
        'return' => 'index'
    ]
];