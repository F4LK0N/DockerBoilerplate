<?php
use Phalcon\Mvc\View;

PROVIDERS::SET(
    'view',
    function () {
        $view = new View();

        $view->registerEngines(
            [
                ".phtml" => \Phalcon\Mvc\View\Engine\Php::class,
                //".volt"  => \Phalcon\Mvc\View\Engine\Volt::class,
            ]
        );
        
        //$view->setBasePath(__DIR__ . "/");

        $view->setViewsDir(PATH_APP.'/views/');
        $view->setLayoutsDir(PATH_APP.'/views/_layouts/');
        $view->setPartialsDir(PATH_APP.'/views/_partials/');

        //$view->setMainView("base");
        //$view->setLayout("main");

        return $view;
    }
);
