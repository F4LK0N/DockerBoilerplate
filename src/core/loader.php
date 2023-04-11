<?php
use Phalcon\Autoload\Loader;

require "profiler.php";
require "dev.php";
require "paths.php";

//require "phalcon-loader.php";

VD_ALL();
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
