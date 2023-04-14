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
            $router = PROVIDERS::GET("router");

            $view = PROVIDERS::GET('view');

            $dispatcher = PROVIDERS::GET('dispatcher');
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

            $response = PROVIDERS::GET('response');
            $response->setContent($view->getContent());
            $response->send();
        }
        catch (\Exception $e) {
            echo 'Exception: ', $e->getMessage();
        }
    }

}

_APPLICATION::RUN();
