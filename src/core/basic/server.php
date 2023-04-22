<? defined("FKN") or http_response_code(403).die('Forbidden!');

class SERVER
{
    static private bool   $LOADED         = false;
    
    static private int    $ENVIRONMENT    = -1;
    static private int    $PROVIDER       = -1;
    static private int    $TIER           = -1;
    
    static private string $HOST           = "";
    static private string $URI            = "";
    


    public function __construct()
    {
        if(self::$LOADED){
            return;
        }
        self::$LOADED = true;

        self::IDENTIFY_HOST();
        self::IDENTIFY_PROVIDER();
        self::IDENTIFY_ENVIRONMENT();
        self::IDENTIFY_TIER();
        self::IDENTIFY_URI();

        //self::SET_PHP_CONFIG();
    }

    static private function IDENTIFY_HOST()
    {
        self::$HOST = strtolower($_SERVER['HTTP_HOST']);
        self::$HOST = (explode(":", self::$HOST))[0];
    }

    static private function IDENTIFY_ENVIRONMENT()
    {
        if(self::$HOST==="127.0.0.1" || self::$HOST==="localhost"){
            self::$ENVIRONMENT = eSERVER_ENVIRONMENT::OFFLINE;
        }else{
            self::$ENVIRONMENT = eSERVER_ENVIRONMENT::ONLINE;
        }
    }

    static private function IDENTIFY_PROVIDER()
    {
        self::$PROVIDER = eSERVER_PROVIDER::UNKNOWN;
    }

    static private function IDENTIFY_TIER()
    {
        self::$TIER = eSERVER_TIER::DEV;

        if(isset($_ENV['TIER'])){
            if($_ENV['TIER']==="PRODUCTION" || $_ENV['TIER']==="PROD"){
                self::$TIER = eSERVER_TIER::PROD;
            } elseif($_ENV['TIER']==="STAGING" || $_ENV['TIER']==="STAG"){
                self::$TIER = eSERVER_TIER::STAG;
            }
        }
    }

    static private function IDENTIFY_URI()
    {
        self::$URI = $_SERVER['REQUEST_URI'];

        while(false!==strpos(self::$URI, '\\')){
            self::$URI = str_replace('\\', "/", self::$URI);
        }

        while(false!==strpos(self::$URI, "//")){
            self::$URI = str_replace("//", "/", self::$URI);
        }

        self::$URI = trim(self::$URI, "/");

        if(strrpos(self::$URI, "?")!==false){
            self::$URI = (substr(self::$URI, 0, strrpos(self::$URI, "?")));
        }
    }

    static private function SET_PHP_CONFIG()
    {
        //Timezone
        date_default_timezone_set("America/Sao_Paulo");

        //Execution Timeout
        set_time_limit(3);

        //Error Reporting
        if(self::$TIER === eSERVER_TIER::DEV){
            error_reporting(E_ALL);
        }else{
            error_reporting(0);
        }
    }

    

    //### ENVIRONMENT ###
    static public function ENVIRONMENT(): int
    {
        return self::$ENVIRONMENT;
    }
    static public function ENVIRONMENT_TOKEN(): string
    {
        if(self::$ENVIRONMENT === eSERVER_ENVIRONMENT::OFFLINE){
            return "OFFLINE";
        }else{
            return "ONLINE";
        }
    }
    static public function ENVIRONMENT_LABEL(): string
    {
        if(self::$ENVIRONMENT === eSERVER_ENVIRONMENT::OFFLINE){
            return "Offline";
        }else{
            return "Online";
        }
    }
    static public function IS_ENVIRONMENT(int $value): bool
    {
        return (self::$ENVIRONMENT === $value);
    }


    
    //### TIER ###
    static public function TIER(): int
    {
        return self::$TIER;
    }
    static public function TIER_TOKEN (): string
    {
        if(self::$TIER === eSERVER_TIER::PROD)
            return "PROD";
        else if(self::$TIER === eSERVER_TIER::STAG)
            return "STAG";
        else
            return "DEV";
    }
    static public function TIER_LABEL (): string
    {
        if(self::$TIER === eSERVER_TIER::PROD)
            return "Production";
        else if(self::$TIER === eSERVER_TIER::STAG)
            return "Staging";
        else
            return "Development";
    }
    static public function IS_TIER ($value): bool
    {
        return (self::$TIER===$value);
    }
    

    
    //### HOST ###
    static public function HOST(): string
    {
        return self::$HOST;
    }
    

    
    //### URI ###
    static public function URI(): string
    {
        return self::$URI;
    }

}

(new SERVER());
