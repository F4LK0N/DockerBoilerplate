<? defined("FKN") or http_response_code(403).die('Forbidden!');

use Phalcon\Di\FactoryDefault;

class PROVIDER
{
    static private ?FactoryDefault $INSTANCE = null;

    static private array           $FILES = [
        "url",
        "router",
        "result",
        "response",
        "db",
        "filter",
        "validator",
        "inputs",
        "security",
    ];



    static public function INSTANCE(): FactoryDefault
    {
        if(self::$INSTANCE === null){
            self::$INSTANCE = new FactoryDefault();
        }
        return self::$INSTANCE;
    }

    static public function GET(string $key, mixed $params=null): mixed
    {
        return self::INSTANCE()->get($key, $params);
    }

    static public function GET_SHARED(string $key, mixed $params=null): mixed
    {
        return self::INSTANCE()->getShared($key, $params);
    }

    static public function SET(string $key, mixed $function)
    {
        self::INSTANCE()->set($key, $function);
    }

    static public function SET_SHARED(string $key, mixed $function)
    {
        self::INSTANCE()->setShared($key, $function);
    }

    static public function LOAD()
    {
        if(self::$INSTANCE!==null){
            return;
        }

        foreach(self::$FILES as $file){
            require PATH_APP . "/_provider/$file.php";
        }
    }

}

PROVIDER::LOAD();
