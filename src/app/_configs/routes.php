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
    $group->add('view/:int', [
        'action' => 'view',
        'id' => 1,
    ]);
    $group->add('edit', [
        'action' => 'edit',
    ]);
    $group->add('edit/:int', [
        'action' => 'edit',
        'id' => 1,
    ]);
    $group->add('rem/:int', [
        'action' => 'rem',
        'id' => 1,
    ]);
$router->mount($group);








$router->handle($_SERVER["REQUEST_URI"]);

CONFIGS::SET("ROUTER", $router);
