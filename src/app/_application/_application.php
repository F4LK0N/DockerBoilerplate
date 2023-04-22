<? defined("FKN") or http_response_code(403).die('Forbidden!');
use Phalcon\Mvc\Application;
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Http\ResponseInterface;

class _APPLICATION
{
    static private ?Application $INSTANCE = null;



    static public function INSTANCE(): Application
    {
        if(self::$INSTANCE === null){
            self::$INSTANCE = new Application(PROVIDER::INSTANCE());
        }
        return self::$INSTANCE;
    }

    static public function LOAD()
    {
        self::INSTANCE();
    }

    static public function RUN()
    {
        try {
            /**
             * @var Router
             */
            $router = PROVIDER::GET("router");
            /**
             * @var Dispatcher
             */
            $dispatcher = PROVIDER::GET('dispatcher');
            $dispatcher->setControllerName($router->getControllerName());
            $dispatcher->setActionName($router->getActionName());
            $dispatcher->setParams($router->getParams());
            $dispatcher->dispatch();
        }
        catch (\Exception $e) {
            echo 'Exception: ', $e->getMessage();

            //$this->response->setJsonContent($this->apiResponse);
            //$this->response->send();
        }
    }

}

_APPLICATION::LOAD();
