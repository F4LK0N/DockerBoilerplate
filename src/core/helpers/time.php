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
        return str_pad($time, 6, "_", STR_PAD_LEFT)."s";
    }

    static private function FORMAT_MICROSECONDS (&$time)
    {
        $time = round((float)$time, 6, PHP_ROUND_HALF_UP);

        VD($time);
        
        //Seconds
        $time = explode(".", $time, 2);
        $s = $time[0];
        
        //MilliSeconds
        $time = (float)@$time[1];
        $time = explode(".", $time, 2);
        $ms = $time[0];
        
        //MicroSeconds
        $time = (float)@$time[1];
        $time = explode(".", $time, 2);
        $us = $time[0];
        
        
        
        $s = str_pad($s, 6, "_", STR_PAD_LEFT)."s";
        $ms = str_pad($ms, 4, "_", STR_PAD_LEFT)."ms";
        $us = str_pad($us, 4, "_", STR_PAD_LEFT)."us";
        
        return $s.$ms.$us;
    }
    
}

$timeSecond = TIME::SECONDS();
VD($timeSecond);
$data=[];
for($i=0; $i<10000; $i++)
{
    for($i2=0; $i2<1000; $i2++)
    {
        $data[$i] = $i * $i2;
    }
}
$timeSecond = TIME::SECONDS($timeSecond);
VD($timeSecond);
VD(TIME::FORMAT($timeSecond));

$timeMicro  = TIME::MICROSECONDS();
VD($timeMicro);
$data=[];
for($i=0; $i<10000; $i++)
{
    for($i2=0; $i2<1000; $i2++)
    {
        $data[$i] = $i * $i2;
    }
}
$timeMicro = TIME::MICROSECONDS($timeMicro);
VD($timeMicro);
VDD(TIME::FORMAT($timeMicro));
