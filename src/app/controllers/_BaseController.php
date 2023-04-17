<? defined("FKN") or http_response_code(403).die('Forbidden!');
use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Dispatcher;
use Phalcon\Http\Response;

class _BaseController extends Controller
{
    protected $apiResponse = [];

    public function beforeExecuteRoute(Dispatcher $dispatcher): bool
    {
        $this->apiResponse = [
            'status'  => 1,
            'error'   => 0,
            'message' => '',
            'data'    => []
        ];
        return true;
    }
    
    protected function setResponse($data)
    {
        $this->apiResponse['data'] = $data;
    }

    protected function addResponse($data)
    {
        $this->apiResponse['data'] = array_merge($this->apiResponse['data'], $data);
    }

    protected function setError(string $message, int $code=1)
    {
        $this->apiResponse = [
            'status'  => 0,
            'error'   => $code,
            'message' => $message,
            'data'    => [],
        ];
        $this->send();
    }

    public function afterExecuteRoute($dispatcher)
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
