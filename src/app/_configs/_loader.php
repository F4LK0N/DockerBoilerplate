<?php
use Phalcon\Autoload\Loader;

class CONFIGS 
{
    static private $LOADER = null; 
    static private $DATA   = [];

    static public function LOADER()
    {
        if(self::$LOADER === null){
            self::$LOADER = new Loader();
        }
        return self::$LOADER;
    }

    static public function REGISTER()
    {
        self::LOADER()->register();
    }

    static public function NAMESPACES($values)
    {
        self::LOADER()->setNamespaces($values);
    }

    static public function DIRECTORIES($values)
    {
        self::LOADER()->setDirectories($values);
    }

    static public function GET($key=null, $key2=null, $key3=null)
    {
        if(!$key){
            return self::$DATA;
        }
        if(!$key2){
            return self::$DATA[$key];
        }
        if(!$key3){
            return self::$DATA[$key][$key2];
        }
        return self::$DATA[$key][$key2][$key3];
    }

    static public function SET($key, $value)
    {
        self::$DATA[$key] = $value;
    }

}

require "app.php";

require "namespaces.php";
require "directories.php";

require "databases.php";


CONFIGS::REGISTER();
