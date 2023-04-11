<?php

use Phalcon\Autoload\Loader;

class CONFIGS 
{
    static private $LOADER = null; 

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

}

require "namespaces.php";
require "directories.php";

CONFIGS::REGISTER();

VDD(CONFIGS::LOADER());
