<? defined("FKN") or http_response_code(403).die('Forbidden!');

class CONFIG
{
    static private array $DATA = [];



    public function __construct()
    {
        self::$DATA['app']    = require 'app.php';
        self::$DATA['db']     = require 'db.php';
        self::$DATA['redis']  = require 'redis.php';
        self::$DATA['bucket'] = require 'bucket.php';
    }

    static public function GET(string $key): array
    {
        return self::$DATA[$key];
    }

}

(new CONFIG());
