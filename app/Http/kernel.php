<?php 
use Laravel\Sanctum\Http\Middleware\EnsureFrontendRequestsAreStateful;

$middlewareGroups = [
    'web' => [
        // ...
    ],

    'api' => [
        EnsureFrontendRequestsAreStateful::class,
        'throttle:api',
        \Illuminate\Routing\Middleware\SubstituteBindings::class,
    ],
];
