<? defined("FKN") or http_response_code(403).die('Forbidden!');

use Phalcon\Mvc\Router;

PROVIDER::SET_SHARED(
    'router',
    function () {
        /**
         * @var Router
         */
        $router = CONFIG::GET('router');
        return $router;
    }
);
