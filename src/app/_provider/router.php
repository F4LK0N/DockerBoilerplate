<?php
use Phalcon\Mvc\Router;

PROVIDER::SET_SHARED(
    'router',
    function () {
        /**
         * @var Router
         */
        $router = CONFIGS::GET('router');
        return $router;
    }
);
