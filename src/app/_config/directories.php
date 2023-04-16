<? defined("FKN") or http_response_code(403).die('Forbidden!');

CONFIG::DIRECTORIES([
    PATH_APP . '/controllers/',
    PATH_APP . '/models/',
]);
