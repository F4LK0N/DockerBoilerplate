<? defined("FKN") or http_response_code(403).die('Forbidden!');

use Phalcon\Mvc\Router;

PROVIDER::SET_SHARED(
    'router',
    function () 
    {
        $router = new Router(false);

        # Default
        #$router->setDefaultModule('web');
        #$router->setDefaultNamespace('App');
        $router->setDefaultController('index');
        $router->setDefaultAction('index');

        # Not Found
        $router->notFound([
            'controller' => 'index',
            'action'     => 'not-found',
        ]);

        # App
        require "routes/index.php";
        require "routes/auth.php";
        require "routes/users.php";


        $router->handle($_SERVER["REQUEST_URI"]);

        return $router;
    }
);
