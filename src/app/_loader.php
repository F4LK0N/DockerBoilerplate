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
    'App\Enumerations' => 'app/enumerations',
    'App\Controllers'  => 'app/controllers',
    'App\Models'       => 'app/models',
]);

//$loader->setFiles([
//    'app/_config/config.php',
//]);

//$loader->setDirectories([
//    'app/enumerations',
//    'app/controllers',
//    'app/models',
//]);



//$eventsManager = new Manager();
//$eventsManager->attach(
//    'loader:beforeCheckClass',
//    function (
//        Event $event, 
//        Loader $loader
//    ) {
//        VD($event);
//        VD($loader);
//        //echo $loader->getCheckedPath();
//    }
//);
//$loader->setEventsManager($eventsManager);



$loader->register(true);
//VDD(spl_autoload_functions());
//VDD(get_declared_classes());



require_once PATH_APP . "/_config/_config.php";
require_once PATH_APP . "/_provider/_provider.php";
require_once PATH_APP . "/_application/_application.php";

_APPLICATION::RUN();
