<? defined("FKN") or http_response_code(403).die('Forbidden!');

use Phalcon\Events\Event;
use Phalcon\Events\Manager;
use Phalcon\Autoload\Loader;



$loader        = new Loader();
$loader->setFileCheckingCallback(null);

//$loader->setClasses([
//    'App\CONFIG'             => 'app/_config/_config.php',
//    'App\PROVIDER'           => 'app/_provider/_provider.php',
//]);

$loader->setNamespaces([
    'App\Controllers' => 'app/controllers/',
    'App\Models'      => 'app/models/',
]);

//$loader->setFiles([
//    'app/_config/config.php',
//]);

$loader->setDirectories([
    PATH_APP.'/controllers/',
    PATH_APP.'/models/',
]);

$loader->register(true);



require_once PATH_APP . "/_provider/_provider.php";
require_once PATH_APP . "/_application/_application.php";

_APPLICATION::RUN();
