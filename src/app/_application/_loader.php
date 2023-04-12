<?php
use Phalcon\Mvc\Application;

class _APPLICATION
{
    static private $INSTANCE = null; 

    static public function INSTANCE()
    {
        if(self::$INSTANCE === null){
            self::$INSTANCE = new Application(PROVIDERS::CONTAINER());
        }
        return self::$INSTANCE;
    }

    static public function RUN()
    {
        try {
            $response = self::INSTANCE()->handle(
                $_SERVER["REQUEST_URI"]
            );
            $response->send();
        }
        catch (\Exception $e) {
            echo 'Exception: ', $e->getMessage();
        }
    }

}

_APPLICATION::RUN();
