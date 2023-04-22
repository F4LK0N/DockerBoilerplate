<?
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Router\Group;

$group = new Group([
    'controller' => 'auth',
]);
$group->setPrefix('/auth/');



$group->add('', [
    //Login/Logout
    'action' => 'index',
]);

$group->add('register', [
    'action' => 'register',
]);

$group->add('activate', [
    'action' => 'activate',
]);

$group->add('reset', [
    'action' => 'reset',
]);



$router->mount($group);
