<?php
use Phalcon\Mvc\Router;

PROVIDERS::SET(
    'router',
    function () {
        /**
         * @var Router
         */
        $router = CONFIGS::GET('ROUTER');
        return $router;
    }
);
