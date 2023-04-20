<? defined("FKN") or http_response_code(403).die('Forbidden!');

use Phalcon\Autoload\Loader;

class CONFIG
{
    static private ?Loader $INSTANCE = null;
    static private array   $DATA     = [];

    static private array   $FILES = [
        'app',
        'enumerations',
        'namespaces',
        'directories',
        'router',
        'db',
        'redis',
        'bucket',
    ];



    static public function INSTANCE(): Loader
    {
        if(self::$INSTANCE === null){
            self::$INSTANCE = new Loader();
        }
        return self::$INSTANCE;
    }

    static public function REGISTER()
    {
        self::INSTANCE()->register(true);
    }

    static public function NAMESPACES(array $values)
    {
        self::INSTANCE()->setNamespaces($values);
        self::$DATA['namespaces'] = $values;
    }

    static public function DIRECTORIES(array $values)
    {
        self::INSTANCE()->setDirectories($values);
        self::$DATA['directories'] = $values;
    }

    static public function GET(string $key=null, string $key2=null, string $key3=null): mixed
    {
        if(!$key){
            return self::$DATA;
        }
        if(!$key2){
            return self::$DATA[$key];
        }
        if(!$key3){
            return self::$DATA[$key][$key2];
        }
        return self::$DATA[$key][$key2][$key3];
    }

    static public function SET(string $key, mixed $value)
    {
        self::$DATA[$key] = $value;
    }

    static public function LOAD()
    {

        //$loader->setClasses(
        //    [
        //        'MyApp\Components\Mail'             => 'app/library/Components/Mail.php',
        //        'MyApp\Controllers\IndexController' => 'app/controllers/IndexController.php',
        //        'MyApp\Controllers\AdminController' => 'app/controllers/AdminController.php',
        //        'MyApp\Models\Invoices'             => 'app/models/Invoices.php',
        //        'MyApp\Models\Users'                => 'app/models/Users.php',
        //    ]
        //);

        //setNamespaces




        if(self::$INSTANCE!==null){
            return;
        }

        foreach(self::$FILES as $file){
            require PATH_APP . "/_config/$file.php";
        }

        self::REGISTER();
    }

}

CONFIG::LOAD();
