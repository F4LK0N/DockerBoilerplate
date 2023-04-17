<?
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Router\Group;

$group = new Group([
    'controller' => 'auth',
]);
$group->setPrefix('/auth/');



$group->add('login', [
    'action' => 'login',
]);

$group->add('logout', [
    'action' => 'logout',
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
