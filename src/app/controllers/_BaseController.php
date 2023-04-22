<? defined("FKN") or http_response_code(403).die('Forbidden!');
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Http\Response;

class _BaseController extends Controller
{
    protected $apiResponse = [];

    public function beforeExecuteRoute(Dispatcher $dispatcher): bool
    {
        //Pass to PROVIDER::GET('response');
        $this->apiResponse = [
            'status' => eSTATUS::SUCCESS,
            'error' => [
                'code'    => eERROR::NONE,
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
            'status' => eSTATUS::ERROR,
            'error' => [
                'code'    => $code??eERROR::NONE,
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
        HEADERS::CONTENT_TYPE(eCONTENT_TYPE::JSON);
        /**
          * @var Response
          */
        $response = PROVIDER::GET_SHARED('response');
        $response->setJsonContent($this->apiResponse);
        $response->send();
        exit(0);
    }

}
