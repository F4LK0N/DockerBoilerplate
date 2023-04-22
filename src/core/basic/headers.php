<? defined("FKN") or http_response_code(403).die('Forbidden!');

class eCONTENT_TYPE
{
	const HTML = 1;
	const JSON = 2;
}

class HEADERS
{
    static private $LOADED            = false;
    
    static private $CORS_REQUEST      = false;
    static private $PREFLIGHT_REQUEST = false;



    public function __construct()
    {
        if(self::$LOADED){
            return;
        }
        self::$LOADED = true;

        self::IDENTIFY_REQUEST();

		self::HANDLE_CORS_REQUEST();
        self::HANDLE_PREFLIGHT_REQUEST();
        self::HANDLE_CONTENT_REQUEST();
    }

    static private function IDENTIFY_REQUEST()
    {
        self::$CORS_REQUEST = isset($_SERVER['HTTP_ORIGIN']) && $_SERVER['HTTP_ORIGIN']!=='';
        
        self::$PREFLIGHT_REQUEST = (
            $_SERVER['REQUEST_METHOD']==='OPTIONS' ||
            ($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHODS']??false) ||
            ($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']??false)
        );
    }

    static private function HANDLE_CORS_REQUEST () 
    {
        if(!self::$CORS_REQUEST){
            return;
        }


        //Allow Origin
        $origin = '*';
        if(self::$PREFLIGHT_REQUEST){
            $origin = $_SERVER['HTTP_ORIGIN'];
        }
        header("Access-Control-Allow-Origin: $origin");


        //Allow Methods
        $allowMethods   = ['GET', 'POST', 'OPTIONS'];
        $requestMethods = explode(',', $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_METHODS'] ?? '');
        foreach($requestMethods as $key){
            $key = trim($key);
            if($key){
                $allowMethods[] = strtoupper($key);
            }
        }
        $allowMethods = array_unique($allowMethods);
        $allowMethods = implode(', ', $allowMethods);
        header("Access-Control-Allow-Methods: $allowMethods");

        
        //Allow Headers
        $allowHeaders   = ['content-type', 'accept-encoding', 'x-requested-with'];
        $requestHeaders = explode(',', $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'] ?? '');
        foreach($requestHeaders as $key){
            $key = trim($key);
            if($key){
                $allowHeaders[] = strtolower($key);
            }
        }
        $allowHeaders = array_unique($allowHeaders);
        $allowHeaders = implode(', ', $allowHeaders);
        header("Access-Control-Allow-Headers: $allowHeaders");
        

        //Max Age
        if(!self::$PREFLIGHT_REQUEST){
            header('Access-Control-Max-Age: 0');
        }

    }

    static private function HANDLE_PREFLIGHT_REQUEST () 
    {
        if(!self::$PREFLIGHT_REQUEST){
            return;
        }

        self::CONTENT_TYPE(eCONTENT_TYPE::HTML);
        self::CACHE_CONTROL(true);
        self::EXPIRES();
        self::E_TAG('CORS');

        //Max Age
        header('Access-Control-Max-Age: 86400');
        
        //Credentials
		header('Access-Control-Allow-Credentials: true');

        //Exit
        http_response_code(204);
        exit(0);
    }

    static private function HANDLE_CONTENT_REQUEST () 
    {
        if(defined('DEBUG')){
            self::CONTENT_TYPE(eCONTENT_TYPE::HTML);
        }else{
            self::CONTENT_TYPE(eCONTENT_TYPE::JSON);
        }
		self::CACHE_CONTROL(false);
		self::EXPIRES();
		self::E_TAG();
    }



	static public function CONTENT_TYPE (int $type=null)
	{
		//Property
		$header = "Content-Type: ";
		//Type
		$header .= ($type===eCONTENT_TYPE::HTML)?"text/html;":"application/json;";
		//Encoding
		$header.=" charset=UTF-8";
		
		header($header);
	}

    static public function CACHE_CONTROL ($useCache=false)
	{
        if($useCache){
            header('Cache-Control: no-cache, no-store, max-age=0, must-revalidate');
            header('pragma: no-cache');
        }else{

        }
	}

    static public function EXPIRES ($lifetime=0)
	{
        if($lifetime===0){
		    header('Age: 0');
            header('Expires: -1');
        }else{

        }
	}

    static public function E_TAG ($tag=null)
	{
        if($tag===null){
            $tag=microtime();
        }
		header('ETag: '.sha1($tag));
	}

}

(new HEADERS());
