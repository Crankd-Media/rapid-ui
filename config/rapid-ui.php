<?php
return [
    'layouts' => [
        'guest' => 'guest',
        'app' => 'app',
    ],
    'design_system' => 'simple', // simaple, playful, elegant, brutalist
    'navigation' => [
        'links' => [
            [
                'title' => 'Dashboard',
                'type' => 'link',
                'route' => 'dashboard',
                'active' => ['dashboard'],
                'icon' => 'trending-up',
            ],
        ]
    ]
];
