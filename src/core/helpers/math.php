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

VD(MATH::MAX(1,10));
VD(MATH::MIN(10,1));
VD(MATH::BETWEEN(-1,1,10));
VD(MATH::BETWEEN(11,1,10));
VD(MATH::BETWEEN(5,1,10));

$min = 50;
$max = -1;
MATH::RANGE_ADJUST($min, $max);
VD($min);
VD($max);
VDD(1);
