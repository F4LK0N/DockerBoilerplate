<? defined("FKN") or http_response_code(403).die('Forbidden!');

CONFIG::SET("bucket", [

    'main' => [
        'host' => '',
        'port' => '',
        'user' => '',
        'name' => '',
    ],
    
]);
