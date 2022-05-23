<?php

return [
    'schedule-class' => 'Illuminate\Console\Scheduling\Schedule',

    'kernel-class' => 'App\Console\Kernel',

    'url' => 'schedule',

    'route-middlewares' => [
        'web',
        'auth',
    ],

    'view' => [
        'title' => '@Schruptor - Scheduled Jobs List',

        'icon' => 'fas fa-sun',

        'icon-color' => 'text-pink-600',

        'name' => 'Scheduled Jobs List',

        'table-fields' => [
            'next-run-date' => true,

            'expression' => false,

            'command' => true,

            'command-closure-with-description' => true,

            'user' => false,

            'evenInMaintenanceMode' => false,

            'withoutOverlapping' => false,

            'description' => false,
        ],

        'cards' => [
            'total-jobs',

            'first-jobs-timezone',
        ],
    ],

    'cache' => false,
];
