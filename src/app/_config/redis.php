<? defined("FKN") or http_response_code(403).die('Forbidden!');

CONFIG::SET("redis", [

    'session' => [
        'host' => '',
        'port' => '',
        'user' => '',
        'name' => '',
    ],

    
]);
