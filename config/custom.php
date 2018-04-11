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
            'product' => 1,
            'brand' => 2,
            'feature' => 3,
            'technology' => 4
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
    'brands' => [
        'brand' => [
            'samsung' => 0,
            'siemens' => 1,
            'theben'  => 2
        ],
    ],
    'product' => [
        'status' => [
            'show' => 0,
            'hide' => 1
        ],
    ],
    'post' => [
        'status' => [
            'hide' => 0,
            'show' => 1
        ],
        'type' => [
            'event' => 0,
            'advertisement' => 1,
            'recruitment' => 2,
            'other' => 3
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