<? defined("FKN") or http_response_code(403).die('Forbidden!');

class STORAGE {
    
    static private $UNITS = [
        "B",
        "KB",
        "MB",
    ];
    
    static public function FORMAT($value)
    {
        $returnString  = "";
        foreach(self::$UNITS as $unity){
            $current = $value%1024;
            if($current>0)
                $returnString = str_pad($current, 3, "_", STR_PAD_LEFT).$unity." ".$returnString;
            else
                $returnString = "__0".$unity." ".$returnString;
            $value = $value/1024;
        }
        
        return substr($returnString, 0, -1);
    }
    
}

VDD(STORAGE::FORMAT(1501026));
