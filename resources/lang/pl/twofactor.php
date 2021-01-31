<?php

return [
    //Information when the code was expired.
    'expire_info' => 'Twoj kod weryfikacyjny wygasł.',

    //Information when the code is incorrect.
    'error' => 'Podany kod dostępowy jest nie prawidłowy.',

    //Information when you want new message with code.
    'send_again' => 'Kod dostępu został wysłany jeszcze raz.',

    //E-mail content.
    'notification' => [
        'subject' => 'Logowanie dwuetapowe',
        'main_line' => 'Twój kod dostępowy to',
        'action' => 'Weryfikuj tutaj',
        'expire_in' => 'Kod wygaśnie w ciągu',
        'minutes' => 'minut'
    ],

    //Preferences controller success messages.
    'preferences' => [
        'set' => 'Logowanie dwuetapowe zostało włączone.',
        'unset' => 'Logowanie dwuetapowe zostało wyłączone.'
    ],

    //Verify view.
    'view' => [
        'header' => 'Weryfikacja dwuetapowa',
        'info' => 'Otrzymasz wiadomość email zawierającą kod weryfikacyjny.',
        'info_if' => 'Jeśli nie otrzymałeś kodu',
        'link' => 'kliknij tutaj',
        'code' => 'Kod weryfikacyjny',
        'logout' => 'Wyloguj',
        'verify' => 'Weryfikuj'
    ],

    //Preferences view.
    'view_preferences' => [
        'header' => 'Weryfikacja dwuetapowa - ustawienia',
        'enable' => 'Włącz 2FA',
        'disable' => 'Wyłącz 2FA'
    ]
];