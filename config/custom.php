<?php
return [
    'male' => 1,
    'female' => 0,
    'user' => 0,
    'admin' => 1,
    'post' =>1,
    'tour' =>0,
    'defaultPath' => 'media/',
    'defaultMedia' => 'media/',
    'stripe' => 1,
    'direct_payment' => 0,
    'media' => [
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
    'cinema_system' => [
        'status' => [
            'block' => 0,
            'active' => 1,
        ]
    ],
    'movie' => [
        'status' => [
            'new_release' => 0,
            'now_showing' => 1,
            'stop_showing' => 2,
            'sneak_show' => 3,
        ],
    ],
    'post' => [
        'status' => [
            'hide' => 0,
            'show' => 1
        ],
        'type' => [
            'promotion' => 0,
            'advertisement' => 1,
        ],
    ],
    'promotion' => [
        'status' => [
            'hide' => 0,
            'show' => 1
        ],
    ],
    'days' => [
        'Monday' => 0,
        'Tuesday' => 1,
        'Wednesday' => 2,
        'Thursday' => 3,
        'Friday' => 4,
        'Saturday' => 5,
        'Sunday' => 6
    ],
];