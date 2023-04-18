<? defined("FKN") or http_response_code(403).die('Forbidden!');

use Phalcon\Http\Request;

class InputsProvider
{
    private eERROR_CODES $code    = eERROR_CODES::NO_ERROR;
    private string       $details = '';
    
    private string $method = '';
    private array  $fields = [];



    private function setError(eERROR_CODES $code=null, string $details='')
    {
        $this->code = $code??eERROR_CODES::INPUT;
        if($details!==''){
            $this->details = $this->details?($this->details.'\n'):$details;
        }
        return true;
    }
    public function hasErrors(): bool
    {
        return ($this->code !== eERROR_CODES::NO_ERROR);
    }
    public function getErrorCode(): eERROR_CODES
    {
        return $this->code;
    }
    public function getErrorDetails(): string
    {
        return $this->details;
    }

    public function post(array $fields): bool
    {
        $this->method = 'POST';
        if(!$this->setFields($fields)){
            return false;
        }
        if(!$this->postRetrieve()){
            return false;
        }
        return true;
    }

    private function setFields(&$fields)
    {
        $this->fields = [];
        foreach($fields as $name => &$config)
        {
            //Name
            if(!is_string($name) || $name===''){
                $this->setError(eERROR_CODES::INPUT_CONFIG, 'Invalid field name!');
                continue;
            }
            //Filters
            if(!isset($config['filters']) || !is_array($config['filters'])){
                $config['filters'] = ['injection'];
            }
            elseif(!in_array('injection', $config['filters'])){
                array_unshift($config['filters'], 'injection');
            }

            //Validations
            if(!isset($config['validations']) || !is_array($config['validations'])){
                $config['validations'] = ['required'=>true];
            }
            elseif(!isset($config['validations']['required'])){
                $config['validations']['required'] = true;
            }

            if(!isset($config['validations']['type'])){
                $config['validations']['type'] = 'string';
            }

            //Value
            $config['value']='';

            //Add
            $this->fields["$name"] = $config;
        }
        return !$this->hasErrors();
    }

    private function postRetrieve ()
    {
        $request = new Request();

        if($request->isPost()){
            return $this->setError(eERROR_CODES::INPUT_METHOD, 'Incorrect http method, POST expected!');
        }

        foreach($this->fields as $name => &$config)
        {
            $config['value'] = $request->getPost($name, null, null);
        }
        return !$this->hasErrors();
    }

}




PROVIDER::SET(
    'inputs',
    function () {
        $inputs = new InputsProvider();
        return $inputs;
    }
);
