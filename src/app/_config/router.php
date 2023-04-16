<?
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Router\Group;

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
CONFIG::SET("router", $router);
