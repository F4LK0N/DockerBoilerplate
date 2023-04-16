<?
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Router\Group;

$group = new Group([
    'controller' => 'index',
]);
$group->setPrefix('/');



$group->add('', [
    'action' => 'index',
]);



$router->mount($group);
