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
            if(!is_string($name) || $name=''){
                $this->setError(eERROR_CODES::INPUT_CONFIG, 'Invalid field name');
                continue;
            }

            //Filter
            VDD($config);

        }

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
