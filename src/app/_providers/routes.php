<?php
use Phalcon\Mvc\Router;

PROVIDERS::SET_SHARED(
    'router',
    function () {
        /**
         * @var Router
         */
        $router = CONFIGS::GET('ROUTER');
        return $router;
    }
);
