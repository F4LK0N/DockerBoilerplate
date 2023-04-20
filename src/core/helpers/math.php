<? defined("FKN") or http_response_code(403).die('Forbidden!');

class MATH
{
    static public function MAX($value1, $value2): mixed
    {
        if($value1 > $value2){
            return $value1;
        }
        return $value2;
    }
    
    static public function MIN($value1, $value2): mixed
    {
        if($value1 < $value2){
            return $value1;
        }
        return $value2;
    }
    
    static public function BETWEEN($value, $bound1, $bound2): mixed
    {
        $max = self::MAX($bound1, $bound2);
        if($value>$max){
            return $max;
        }
        $min = self::MIN($bound1, $bound2);
        if($value<$min){
            return $min;
        }
        return $value;
    }

    static public function RANGE_ADJUST(&$min, &$max): void
    {
        $minFinal = self::MIN($min, $max);
        $maxFinal = self::MAX($min, $max);
        $min = $minFinal;
        $max = $maxFinal;
    }
    
}
