<? defined("FKN") or http_response_code(403).die('Forbidden!');

class eHEADER_CONTENT_TYPE
{
	public const HTML = 1;
	public const JSON = 2;
}
class HEADERS
{
    static public function LOAD()
	{
		self::CONTENT_TYPE();
		self::CORS();
		self::OPTIONS();
	}

	static public function CONTENT_TYPE (int $type=null)
	{
		//Property
		$header = "Content-Type: ";
		//Type
		$header .= ($type===eHEADER_CONTENT_TYPE::HTML)?"text/html;":"application/json;";
		//Encoding
		$header.=" charset=utf-8";
		
		header($header);
	}
	
	static public function CORS()
	{
		header('Access-Control-Allow-Origin: *');
		header('Access-Control-Allow-Credentials: true');
		header('Access-Control-Max-Age: 86400');
		header("Access-Control-Allow-Methods: GET, POST, OPTIONS");
		header("Access-Control-Allow-Headers: " . (isset($_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS']) ? $_SERVER['HTTP_ACCESS_CONTROL_REQUEST_HEADERS'].", " : "")."X-Requested-With, Accept-Encoding");
	}
	static public function OPTIONS()
	{
		//OPTIONS (Pre-flight requests)
		//If the $_SERVER['REQUEST_METHOD'] is of the type "OPTIONS" is probably because the ajax plugin from the front-end is performing a 'pre-flight' request.
		//A 'pre-flight' is a request to the API to know the accepted content formats, compression, cross-origins requests and etc.
		//In this case the server only need to respond with http headers and don't need to enter inside the API logic, saving resources.
		if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS'){
			exit(0);
        }
	}

}

HEADERS::LOAD();
