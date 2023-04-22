<? defined("FKN") or http_response_code(403).die('Forbidden!');
use Phalcon\Mvc\Application;
use Phalcon\Mvc\Router;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Mvc\View;
use Phalcon\Http\Response;

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
            $view       = self::RUN_VIEW($dispatcher);
            self::RUN_RESPONSE($view);
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
        return $dispatcher;
    }

    static private function RUN_VIEW(Dispatcher &$dispatcher): View
    {
        /**
         * @var View
         */
        $view = PROVIDER::GET('view');
        $view->start();
        $dispatcher->dispatch();
        $view->render(
            $dispatcher->getControllerName(),
            $dispatcher->getActionName(),
            $dispatcher->getParams()
        );
        $view->finish();
        return $view;
    }

    static private function RUN_RESPONSE(View &$view)
    {
        /**
         * @var Response
         */
        $response = PROVIDER::GET('response');
        $response->setContent($view->getContent());
        $response->send();
    }

}

_APPLICATION::LOAD();
