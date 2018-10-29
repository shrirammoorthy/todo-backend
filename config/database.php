<?php 

return [

'default' => env('DB_CONNECTION', 'mysql'),

'connections' => [

'mysql' => [
    'driver'    => 'mysql',
    'host'      => env('DB_HOST', '127.0.0.1'),
    'port'      => env('DB_PORT', 3306),
    'database'  => env('DB_DATABASE', 'lumen_todo'),
    'username'  => env('DB_USERNAME', 'root'),
    'password'  => env('DB_PASSWORD', 'root'),
    'charset'   => env('DB_CHARSET', 'utf8mb4'),
    'collation' => env('DB_COLLATION', 'utf8mb4_unicode_ci'),
    'prefix'    => env('DB_PREFIX', ''),
    'timezone'  => env('DB_TIMEZONE', '+00:00'),
    'strict'    => env('DB_STRICT_MODE', false),
],
]
];