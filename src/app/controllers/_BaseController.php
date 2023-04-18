<? defined("FKN") or http_response_code(403).die('Forbidden!');
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Http\Response;

enum eRESPONSE_STATUS_CODES: int
{
    case SUCCESS = 1;
    case ERROR   = 0;
}

enum eERROR_CODES: int
{
    case NO_ERROR    = 0;

    //CONTROLLERS
    case CONTROLLER  = 10000; //Generic Controller Error.
    case CONTROLLER_INPUT       = 11000; //Error on the input (get, filter or validate)
    case CONTROLLER_NOT_FOUND   = 12000; //When required, the register was not found on db.
    case CONTROLLER_RULE        = 13000; //When set, some model rule was not complied.
    case CONTROLLER_TRANSACTION = 14000; //When set, the db transaction has an error (querying, saving, updating, deleting)
    case CONTROLLER_ENCODE      = 15000; //Error encoding the response in JSON format.

    //INPUT
    case INPUT            = 100; //Generic Input Error.
    case INPUT_CONFIG     = 101; //Invalid Config
    case INPUT_RETRIEVE   = 102; //Cannot Retrieve
    case INPUT_FILTER     = 103; //Filter Error
    case INPUT_VALIDATION = 104; //Validation Error
}

class _BaseController extends Controller
{
    protected $apiResponse = [];

    public function beforeExecuteRoute(Dispatcher $dispatcher): bool
    {
        $this->apiResponse = [
            'status' => eRESPONSE_STATUS_CODES::SUCCESS,
            'error' => [
                'code'    => eERROR_CODES::NO_ERROR,
                'message' => '',
                'details' => '',
            ],
            'data' => [],
        ];
        return true;
    }
    
    protected function setData($data)
    {
        $this->apiResponse['data'] = $data;
    }

    protected function setError(string $message, int $code=null, $details='')
    {
        $this->apiResponse = [
            'status' => eRESPONSE_STATUS_CODES::ERROR,
            'error' => [
                'code'    => ($code??eERROR_CODES::CONTROLLER),
                'message' => $message,
                'details' => $details,
            ],
            'data' => [],
        ];
        $this->send();
    }

    public function afterExecuteRoute(Dispatcher $dispatcher)
    {
        $this->send();
    }

    protected function send()
    {
        HEADERS::CONTENT_TYPE(eHEADER_CONTENT_TYPE::JSON);
        $this->response->setJsonContent($this->apiResponse);
        $this->response->send();
        exit(0);
    }

}
