<?php
use Phalcon\Mvc\Application;
use Phalcon\Mvc\Router;

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
            $router=CONFIGS::GET("ROUTER");
            VD( $router->handle($_SERVER["REQUEST_URI"]));
            VDD($router);

            $response = self::INSTANCE()->handle(
                $_SERVER["REQUEST_URI"]
            );
            $response->send();
        }
        catch (\Exception $e) {
            VDD($e);
            echo 'Exception: ', $e->getMessage();
        }
    }

}

_APPLICATION::RUN();
