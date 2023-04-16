<? defined("FKN") or http_response_code(403).die('Forbidden!');

CONFIG::NAMESPACES([
    'App\Controllers' => 'app/controllers/',
    'App\Models' => 'app/models/',
]);
