<?php
return [
    'male' => 1,
    'female' => 0,
    'user' => 0,
    'admin' => 1,
    'post' =>1,
    'tour' =>0,
    'defaultPath' => 'images/',
    'defaultMedia' => 'media/',
    'stripe' => 1,
    'direct_payment' => 0,
    'media' => [
        'type' => [
            'post' => 0,
            'movie' => 1,
            'cinema' => 2
        ],
        'status' => [
            'hide' => 0,
            'show' => 1
        ]
    ],
    'types' => [
        'type' => [
            'post' => 0,
            'movie' => 1,
        ],
    ],
    'cinema' => [
        'status' => [
            'block' => 0,
            'active' => 1,
        ],
    ],
    'movie' => [
        'status' => [
            'new_release' => 0,
            'now_showing' => 1,
            'stop_showing' => 2
        ],
    ],
    'post' => [
        'status' => [
            'hide' => 0,
            'show' => 1
        ],
    ],
];