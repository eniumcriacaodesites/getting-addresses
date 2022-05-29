<?php

return [
    'integration' => [
        'host' => env('IBGE_REST_INTEGRATION_HOST', 'http://localhost:8000'),
        'timeout' => env('IBGE_REST_INTEGRATION_TIMEOUT', 20),
        'google' => [
            'maps' => env('GOOGLE_MAP_KEY')
        ]
    ],
];