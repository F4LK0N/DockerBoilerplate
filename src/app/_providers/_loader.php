<?php
use Phalcon\Di\FactoryDefault;

class PROVIDERS
{
    static private $CONTAINER = null;

    static public function CONTAINER()
    {
        if(self::$CONTAINER === null){
            self::$CONTAINER = new FactoryDefault();
        }
        return self::$CONTAINER;
    }

    static public function GET($key=null)
    {
        if(!$key){
            return self::CONTAINER();
        }
        return self::CONTAINER()[$key];
    }

    static public function SET($key, $function)
    {
        self::CONTAINER()->set($key, $function);
    }

}

require "view.php";
require "url.php";
