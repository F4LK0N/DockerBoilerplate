<? defined("FKN") or http_response_code(403).die('Forbidden!');

class SECURITY
{
    static private int $ITERATIONS_MINIMUM   = 10;
    static private int $ITERATIONS_VARIATION = 3;



    static private function ITERATIONS(string &$value): int
    {
        return (self::$ITERATIONS_MINIMUM + (strlen($value) % (1 + self::$ITERATIONS_VARIATION)));
    }

    static public function HASH(string $value): string
    {
        $iterations = self::ITERATIONS($value);
        for($i=0; $i<$iterations; $i++){
            $value = substr((md5(sha1($value)).sha1(md5($value))), 5);
        }
        return md5($value).md5(sha1($value));
    }

    static public function TOKEN(): string
    {
        return self::HASH(microtime().rand(1000,9999));
    }

}
