<?php
use Phalcon\Di\FactoryDefault;

class PROVIDERS
{
    static private $CONTAINER = null;

    static private function CONTAINER()
    {
        if(self::$CONTAINER === null){
            self::$CONTAINER = new FactoryDefault();
        }
        return self::$CONTAINER;
    }

    static public function GET($key=null)
    {
        if(!$key){
            return self::$CONTAINER;
        }
        return self::$CONTAINER[$key];
    }

    static public function SET($key, $function)
    {
        self::$CONTAINER->set($key, $function);
    }

}

$container = new FactoryDefault();
$container->set(
    'view',
    function () {
        $view = new View();
        $view->setViewsDir(APP_PATH . '/views/');
        return $view;
    }
);
$container->set(
    'url',
    function () {
        $url = new Url();
        $url->setBaseUri('/');
        return $url;
    }
);
