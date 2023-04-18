<?

use Phalcon\Http\Response;

 defined("FKN") or http_response_code(403).die('Forbidden!');

class ResultError
{
    public int    $code    = eERROR_CODES::NO_ERROR;
    public string $details = '';
}

class Result
{
    public int          $status = eRESPONSE_STATUS_CODES::SUCCESS;
    public ?ResultError $error  = null;
    public array        $data   = [];

    public function __construct()
    {
        $this->error = new ResultError();
    }

    protected function setError(int $code, $details='')
    {
        $this->status         = eRESPONSE_STATUS_CODES::ERROR;
        $this->error->code    = $code??eERROR_CODES::GENERIC_ERROR;
        $this->error->details = $details;
        $this->data           = [];
    }
}

PROVIDER::SET(
    'result',
    function () {
        $response = new Response();
        return $response;
    }
);
