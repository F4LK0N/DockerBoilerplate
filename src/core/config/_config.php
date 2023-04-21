<? defined("FKN") or http_response_code(403).die('Forbidden!');

class CONFIG
{
    static private array $FILES = [
        'app',
        'db',
        'redis',
        'bucket',
    ];
    
    static private array $DATA = [];



    public function __construct()
    {
        foreach(self::$FILES as $file){
            self::$DATA[$file] = require "$file.php";
        }
        self::$FILES = [];
    }

    static public function GET(string $key): array
    {
        return self::$DATA[$key];
    }

    static public function SET(string $key, mixed $value)
    {
        self::$DATA[$key] = $value;
    }

}

(new CONFIG());
