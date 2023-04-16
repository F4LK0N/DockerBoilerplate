<? defined("FKN") or http_response_code(403).die('Forbidden!');

use Phalcon\Di\FactoryDefault;

class PROVIDER
{
    static private ?FactoryDefault $INSTANCE = null;

    static private array           $FILES = [
        "url",
        "router",
        "session",
        "response",
    ];



    static public function INSTANCE(): FactoryDefault
    {
        if(self::$INSTANCE === null){
            self::$INSTANCE = new FactoryDefault();
        }
        return self::$INSTANCE;
    }

    static public function GET(string $key=null): mixed
    {
        if(!$key){
            return self::INSTANCE();
        }
        return self::INSTANCE()[$key];
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
