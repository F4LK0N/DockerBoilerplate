<? defined("FKN") or http_response_code(403).die('Forbidden!');

CONFIG::SET("bucket", [

    'profile' => [
        'host' => '',
        'port' => '',
        'user' => '',
        'name' => '',
    ],
    'news' => [
        'host' => '',
        'port' => '',
        'user' => '',
        'name' => '',
    ],
]);
