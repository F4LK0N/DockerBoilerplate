<? defined("FKN") or http_response_code(403).die('Forbidden!');

class TIME
{
    static public function SECONDS(int $start=0): int
    {
        return (time() - $start);
    }

    static public function MICROSECONDS(float $start=0.0): float
    {
        return (microtime(true) - $start);
    }
    
    static public function FORMAT ($time)
    {
        if(is_int($time)){
            return self::FORMAT_SECONDS($time);
        }else{
            return self::FORMAT_MICROSECONDS($time);
        }
    }

    static private function FORMAT_SECONDS (&$time)
    {
        return str_pad($time, 3, "_", STR_PAD_LEFT)."s";
    }

    static private function FORMAT_MICROSECONDS (&$time)
    {
        $s = floor($time);
        $ms = intval(($time * 1000)%1000);
        return 
            str_pad($s, 3, "_", STR_PAD_LEFT)."s ".
            str_pad($ms, 3, "_", STR_PAD_LEFT)."ms";
    }
    
}
