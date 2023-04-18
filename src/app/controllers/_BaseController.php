<? defined("FKN") or http_response_code(403).die('Forbidden!');
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Http\Response;

enum eRESPONSE_STATUS_CODES: int
{
    const SUCCESS = 1;
    const ERROR   = 0;
}

class eERROR_CODES
{
    const NO_ERROR    = 0;

    //CONTROLLERS
    const CONTROLLER             = 10000; //Generic Controller Error.
    const CONTROLLER_INPUT       = 11000; //Error on the input (get, filter or validate)
    const CONTROLLER_NOT_FOUND   = 12000; //When required, the register was not found on db.
    const CONTROLLER_RULE        = 13000; //When set, some model rule was not complied.
    const CONTROLLER_TRANSACTION = 14000; //When set, the db transaction has an error (querying, saving, updating, deleting)
    const CONTROLLER_ENCODE      = 15000; //Error encoding the response in JSON format.

    //INPUT
    const INPUT            = 100; //Generic Input Error.
    const INPUT_CONFIG     = 101; //Invalid Config
    const INPUT_METHOD     = 102; //Incorrect method used.
    const INPUT_RETRIEVE   = 103; //Cannot Retrieve
    const INPUT_FILTER     = 104; //Filter Error
    const INPUT_VALIDATION = 105; //Validation Error
}

class _BaseController extends Controller
{
    protected $apiResponse = [];

    public function beforeExecuteRoute(Dispatcher $dispatcher): bool
    {
        //Pass to PROVIDER::GET('response');
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

    protected function setError(int $code, $details='')
    {
        //Pass to PROVIDER::GET('response');
        $this->apiResponse = [
            'status' => eRESPONSE_STATUS_CODES::ERROR,
            'error' => [
                'code'    => $code??eERROR_CODES::NO_ERROR,
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
        //Pass to PROVIDER::GET('response');
        HEADERS::CONTENT_TYPE(eHEADER_CONTENT_TYPE::JSON);
        /**
          * @var Response
          */
        $response = PROVIDER::GET_SHARED('response');
        $response->setJsonContent($this->apiResponse);
        $response->send();
        exit(0);
    }

}
