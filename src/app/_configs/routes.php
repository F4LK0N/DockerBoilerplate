<?php
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



# Index
$group = new Group([
    'controller' => 'index',
]);
    $group->setPrefix('/');

    $group->add('', [
        'action' => 'index',
    ]);
$router->mount($group);



# Users
$group = new Group([
    'controller' => 'users',
]);
    $group->setPrefix('/users/');

    $group->add('', [
        'action' => 'list',
    ]);
    $group->add('view', [
        'action' => 'view',
    ]);
    $group->add('edit', [
        'action' => 'edit',
    ]);
    $group->add('rem', [
        'action' => 'rem',
    ]);
$router->mount($group);








$router->handle($_SERVER["REQUEST_URI"]);

//VD(($_SERVER["REQUEST_URI"]));
//echo '"'.$router->getControllerName().'"<br>';
//echo '"'.$router->getActionName().'"<br>';
//die;
////VDD($router->getMatchedRoute());


////Adjust Routes Not Found



CONFIGS::SET("ROUTER", $router);
