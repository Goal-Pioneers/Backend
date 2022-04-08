<?php

    return 
    [
        'defaults' => 
        [
            'guard' => 'web',
            'passwords' => 'accounts',
        ],


        'guards' => [
            'web' => [
                'driver' => 'session',
                'provider' => 'users',
            ],
        ],


        'providers' => 
        [
            'users' => 
            [
                'driver' => 'eloquent',
                'model' => App\Models\AccountModel::class,
            ],
        ],


        'passwords' => 
        [
            'users' => 
            [
                'provider' => 'users',
                'table' => 'password_resets',
                'expire' => 60,
                'throttle' => 60,
            ],
        ],


        'password_timeout' => 14400,
    ];
?>