<?

use Phalcon\Http\Response;

 defined("FKN") or http_response_code(403).die('Forbidden!');

class ResultError
{
    public int    $code    = eERROR::NONE;
    public string $details = '';
}

class Result
{
    public int          $status = eSTATUS::SUCCESS;
    public ?ResultError $error  = null;
    public array        $data   = [];

    public function __construct()
    {
        $this->error = new ResultError();
    }

    public function hasErrors(): bool
    {
        return ($this->error->code !== eERROR::NONE);
    }

    public function getErrorCode(): int
    {
        return $this->error->code;
    }
    public function getErrorDetails(): string
    {
        return $this->error->details;
    }

    public function setError(int $code, $details='')
    {
        $this->status          = eSTATUS::ERROR;
        $this->error->code     = $code??eERROR::GENERIC;
        $this->error->details .= ($this->error->details?'\n':'').$details;
        $this->data            = [];
    }

    public function setData(array $data)
    {
        $this->data = $data;
    }

    public function get($key=null)
    {
        if($key===null){
            return $this->data;
        }
        return $this->data[$key];
    }

}

PROVIDER::SET(
    'result',
    function () {
        $response = new Response();
        return $response;
    }
);
