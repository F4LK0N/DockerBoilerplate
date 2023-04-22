<? defined("FKN") or http_response_code(403).die('Forbidden!');

CONFIG::SET("api", [

    'data' => [
        'host' => '',
        'port' => '',
        'user' => '',
        'name' => '',
    ],
]);
