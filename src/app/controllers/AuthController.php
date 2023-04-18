<? defined("FKN") or http_response_code(403).die('Forbidden!');
use Phalcon\Mvc\Controller;
use Phalcon\Http\Request;
use Phalcon\Filter\Filter;
use Phalcon\Filter\Validation;
use Phalcon\Filter\Validation\Validator\Email;
use Phalcon\Filter\Validation\Validator\PresenceOf;



class AuthController extends _BaseController
{
    public function loginAction()
    {
        $inputs = PROVIDER::GET('inputs');
        $inputs->post([
            'email' => [
                'filters' => [
                    'injection',
                    'spaces'],
                'validations' => [
                    'type'=>'email',
                    'required'=>true],
            ],
            'pass' => [
                'filters' => [
                    'injection',
                    'spaces'],
                'validations' => [
                    'type'=>'pass',
                    'required'=>true],
            ],
        ]);
        if($inputs->hasErrors()){
            $this->setError(
                eERROR_CODES::CONTROLLER_INPUT + $inputs->getErrorCode(),
                $inputs->getErrorDetails()
            );
        }

        $email = $inputs->get('email');
        $pass  = $inputs->get('pass');

        $result = UsersController::login($email, $pass);
        if($result->hasErrors()){
            $this->setError(
                $result->getErrorCode(),
                $result->getErrorDetails()
            );
        }
        
        $this->setData($result->get());
    }

}
