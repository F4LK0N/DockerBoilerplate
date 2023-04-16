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
            $dispatcher = self::RUN_DISPATCHER();
            self::RUN_RESPONSE($dispatcher);
        }
        catch (\Exception $e) {
            echo 'Exception: ', $e->getMessage();
        }
    }

    static private function RUN_DISPATCHER(): Dispatcher
    {
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
        return $dispatcher;
    }

    static private function RUN_RESPONSE(Dispatcher &$dispatcher)
    {
        /**
         * @var ResponseInterface
         */
        $response = $dispatcher->getReturnedValue();
        if ($response instanceof ResponseInterface) {
            $response->send();
        }
    }

}

_APPLICATION::LOAD();
