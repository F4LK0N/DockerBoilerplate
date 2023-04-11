<?php

//use Phalcon\Di\FactoryDefault;
//use Phalcon\Autoload\Loader;
//use Phalcon\Mvc\View;
//use Phalcon\Mvc\Application;
//use Phalcon\Url;

require "../core/_loader.php";
die;


$loader = new Loader();
$loader->setNamespaces(
    [
       'App'        => 'app/',
       'App\Models' => 'app/models',
       'Tests' => 'tests/',
    ]
);
$loader->setDirectories(
    [
        APP_PATH . '/controllers/',
        APP_PATH . '/models/',
    ]
);
$loader->register();


$container = new FactoryDefault();
$container->set(
    'view',
    function () {
        $view = new View();
        $view->setViewsDir(APP_PATH . '/views/');
        return $view;
    }
);
$container->set(
    'url',
    function () {
        $url = new Url();
        $url->setBaseUri('/');
        return $url;
    }
);


$application = new Application($container);

try {
    $response = $application->handle(
        $_SERVER["REQUEST_URI"]
    );
    $response->send();
} 
catch (\Exception $e) {
    echo 'Exception: ', $e->getMessage();
}
