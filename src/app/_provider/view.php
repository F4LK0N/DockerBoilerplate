<? defined("FKN") or http_response_code(403).die('Forbidden!');

use Phalcon\Mvc\View;

PROVIDER::SET(
    'view',
    function () {
        $view = new View();

        $view->registerEngines(
            [
                ".phtml" => \Phalcon\Mvc\View\Engine\Php::class,
                //".volt"  => \Phalcon\Mvc\View\Engine\Volt::class,
            ]
        );
        
        //$view->setBasePath(__DIR__ . "/");

        $view->setViewsDir(PATH_APP.'/views/');
        $view->setLayoutsDir(PATH_APP.'/views/_layouts/');
        $view->setPartialsDir(PATH_APP.'/views/_partials/');

        $view->setMainView("main");
        $view->setLayout("main");

        return $view;
    }
);
