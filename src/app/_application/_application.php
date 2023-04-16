<?php
use Phalcon\Mvc\Application;

class _APPLICATION
{
    static private $INSTANCE = null; 

    static public function INSTANCE()
    {
        if(self::$INSTANCE === null){
            self::$INSTANCE = new Application(PROVIDER::INSTANCE());
        }
        return self::$INSTANCE;
    }

    static public function RUN()
    {
        try {
            $router = PROVIDER::GET("router");

            $view = PROVIDER::GET('view');

            $dispatcher = PROVIDER::GET('dispatcher');
            $dispatcher->setControllerName($router->getControllerName());
            $dispatcher->setActionName($router->getActionName());
            $dispatcher->setParams($router->getParams());

            $view->start();
            $dispatcher->dispatch();
            $view->render(
                $dispatcher->getControllerName(),
                $dispatcher->getActionName(),
                $dispatcher->getParams()
            );
            $view->finish();

            $response = PROVIDER::GET('response');
            $response->setContent($view->getContent());
            $response->send();
        }
        catch (\Exception $e) {
            echo 'Exception: ', $e->getMessage();
        }
    }

}

_APPLICATION::RUN();
