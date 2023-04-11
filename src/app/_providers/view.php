<?php
use Phalcon\Mvc\View;

PROVIDERS::SET(
    'view',
    function () {
        $view = new View();
        $view->setViewsDir(PATH_APP.'/views/');
        return $view;
    }
);
