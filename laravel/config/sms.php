<?php

return [

    'driver' => env('SMS_DRIVER', 'accrete'),

    'accrete' => [
        'id'         => env('ACCRETE_ID'),
        'password'   => env('ACCRETE_PASSWORD'),
        'entry_point' => env('ACCRETE_URL'),
        'parser'     => [
            'type' => 'csv',
        ],
    ],

];
