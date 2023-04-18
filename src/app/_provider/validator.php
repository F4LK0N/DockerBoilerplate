<? defined("FKN") or http_response_code(403).die('Forbidden!');

use Phalcon\Filter\Validation;
use Phalcon\Filter\Validation\Validator\Email;
use Phalcon\Filter\Validation\Validator\PresenceOf;
use Phalcon\Filter\Validation\Validator\StringLength\Max;
use Phalcon\Filter\Validation\Validator\StringLength\Min;

class ValidatorProvider
{
    private bool         $error   = false;
    private string       $details = '';

    private ?Validation $validator = null;
    private string      $errorDetails = '';
    


    public function __construct ()
	{
        $this->validator = new Validation();
    }

    private function setError(string $details='')
    {
        $this->error   =  true;
        $this->details .= ($this->details?'\n':'').$details;
    }
    public function hasErrors(): bool
    {
        return $this->error;
    }
    public function getErrorDetails(): string
    {
        return $this->details;
    }

    public function add($name, &$validations)
    {
        foreach($validations as $rule => &$param)
        {
            if($rule==='type'){
                $this->addType($name, $param);
                continue;
            }
            if($rule==='required'){
                if($param===true){
                    $this->addRequired($name, $param);
                }
                continue;
            }
        }
    }

    private function addType($name, $type)
    {
        if($type==='email'){
            $this->validator->add($name, new Email(['message' => "'$name' invalid!"]));
        }
    }

    private function addRequired($name)
    {
        $this->validator->add($name, new PresenceOf(['message' => "'$name' is required!"]));
    }

    private function addSizeMin($name, $param)
    {
        $this->validator->add($name, new Min(["min"=>$param, "message"=> "'$name' min size $param!"]));
    }

    private function addSizeMax($name, $param)
    {
        $this->validator->add($name, new Max(["max"=>$param, "message"=> "'$name' max size $param!"]));
    }

    public function validate(&$data)
    {
        $errors = $this->validator->validate($data);
        if(count($errors)>0){
            foreach($errors as $error){
                $this->setError($error);
            }
            return false;
        }
        return true;
    }

}



PROVIDER::SET_SHARED(
    'validator',
    function ()
    {
        $validator = new ValidatorProvider();
        return $validator;
    }
);
