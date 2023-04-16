<?php
use Phalcon\Mvc\Router;

PROVIDER::SET_SHARED(
    'router',
    function () {
        /**
         * @var Router
         */
        $router = CONFIG::GET('router');
        return $router;
    }
);
