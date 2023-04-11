<?php
use Phalcon\Mvc\View;

PROVIDERS::SET(
    'view',
    function () {
        $view = new View();
        $view->setViewsDir(APP_PATH . '/views/');
        return $view;
    }
);
