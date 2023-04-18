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
            $this->details .= $details.'\n';
        }
        return true;
    }

    public function hasError(): bool
    {
        return ($this->code !== eERROR_CODES::NO_ERROR);
    }

    public function post(array $fields): bool
    {
        $this->method = 'POST';
        if($this->setFields($fields)){
            return false;
        }
        //$this->postRetrieve();
        return true;
    }

    private function setFields(&$fields)
    {
        $this->fields = [];
        foreach($fields as $name => &$config)
        {
            //Name
            if(!is_string($name) || $name===''){
                $this->setError(eERROR_CODES::INPUT_CONFIG, 'Invalid field name');
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
            if(isset($config['default'])){
                $config['value'] = $config['default'];
                unset($config['default']);
            }

            //Add
            $this->fields["$name"] = $config;
        }
        return !$this->hasError();
    }

    private function postRetrieve ()
    {
        $request = new Request();
        foreach($this->fields as $name => &$field)
        {
            if(!is_string($name))

            $field['value'] = $request->getPost($name, null, '');
        }
        die;
    }

}




PROVIDER::SET(
    'inputs',
    function () {
        $inputs = new InputsProvider();
        return $inputs;
    }
);
