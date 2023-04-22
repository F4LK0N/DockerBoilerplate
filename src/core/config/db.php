<? defined("FKN") or http_response_code(403).die('Forbidden!');

return [

    'main' => [
        'host'     => 'mysql',
        'username' => 'root',
        'password' => 'root',
        'dbname'   => 'app',
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
    
];
