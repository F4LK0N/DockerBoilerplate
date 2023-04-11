<?php
use Phalcon\Autoload\Loader;


require "paths.php";
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
        ROOT . '/controllers/',
        ROOT . '/models/',
    ]
);
$loader->register();

var_dump($loader);
