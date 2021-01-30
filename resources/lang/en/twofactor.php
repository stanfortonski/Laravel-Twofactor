<?php

return [
    //Information when the code was expired.
    'expire_info' => 'Your verification code has expired.',

    //Information when the code is incorrect.
    'error' => 'The access code provided is incorrect.',

    //Information when you want new message with code.
    'send_again' => 'Access code has been sent again.',

    //E-mail content.
    'notification' => [
        'subject' => 'Two-factor login',
        'main_line' => 'Your access code',
        'action' => 'Verify here',
        'expire_in' => 'It expires within',
        'minutes' => 'minutes'
    ],

    //Preferences controller success messages.
    'preferences' => [
        'set' => 'Two-factor auth is enabled.',
        'unset' => 'Two-factor auth is disabled.'
    ],

    //View translate.
    'view' => [
        'header' => 'Two-factor authentication',
        'info' => 'You will receive an email containing a verification code.',
        'info_if' => 'If you haven\'t received the code',
        'link' => 'click here',
        'code' => 'Verification code',
        'logout' => 'Logout',
        'verify' => 'Verify'
    ]
];