<?php
use Phalcon\Mvc\Router;

$router = new Router();

# Default
#$router->setDefaultModule('web');
#$router->setDefaultNamespace('App');
$router->setDefaultController('index');
$router->setDefaultAction('index');

# Index


# Not Found
$router->notFound(
    [
        'controller' => 'index',
        'action'     => 'index',
    ]
);

$router->add(
    '/login',
    [
        'controller' => 'login',
        'action'     => 'index',
    ]
);

$router->add(
    '/products/:action',
    [
        'controller' => 'products',
        'action'     => 1,
    ]
);

$router->handle($_SERVER["REQUEST_URI"]);

CONFIGS::SET("ROUTER", $router);
