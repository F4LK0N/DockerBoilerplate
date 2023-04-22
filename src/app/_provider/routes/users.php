<?
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Router\Group;

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

$group->add('add', [
    'action' => 'add',
]);

$group->add('edit/:int', [
    'action' => 'edit',
    'id' => 1,
]);

$group->add('edit-pass/:int', [
    'action' => 'edit',
    'id' => 1,
]);

$group->add('rem/:int', [
    'action' => 'rem',
    'id' => 1,
]);



$router->mount($group);
