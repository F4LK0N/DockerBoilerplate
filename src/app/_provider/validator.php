<? defined("FKN") or http_response_code(403).die('Forbidden!');

use Phalcon\Filter\Validation;
use Phalcon\Filter\Validation\Validator\Email;
use Phalcon\Filter\Validation\Validator\PresenceOf;

class ValidatorProvider
{
    private ?Validation $validator = null;
    
    public function __construct ()
	{
        $this->validator = new Validation();
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
            $this->validator->add($name, new Email(['message' => "'$name' invalid value for email!"]));
        }
    }

    private function addRequired($name)
    {
        $this->validator->add($name, new PresenceOf(['message' => "'$name' is required!"]));
    }

    public function validate(&$data)
    {
        $errors = $this->validator->validate($data);
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
