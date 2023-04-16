<? defined("FKN") or http_response_code(403).die('Forbidden!');

CONFIG::SET("database", [

    'main' => [
        'host' => '',
        'port' => '',
        'user' => '',
        'name' => '',
    ],

    'tdd' => [
        'host' => '',
        'port' => '',
        'user' => '',
        'name' => '',
    ],

    'performance' => [
        'host' => '',
        'port' => '',
        'user' => '',
        'name' => '',
    ],
]);
