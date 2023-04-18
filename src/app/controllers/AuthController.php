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
                    'required'=>true,
                    'size-min'=>6,
                    'size-max'=>25,
                    'size'=>25,
                    'email'=>25,],
            ],
            'pass' => [
                'filters' => [
                    'injection'],
                'validations' => [
                    'type'=>'pass',
                    'required'=>true,
                    'size-min'=>6,
                    'size-max'=>25,],
            ],
            'test' => [
                'validations' => [
                    'required' => false,
                ],
                'default' => ' as  asd \''
            ],
        ]);
        if($inputs->hasErrors()){
            $this->setError(
                eERROR_CODES::CONTROLLER_INPUT + $inputs->getErrorCode(),
                $inputs->getErrorDetails()
            );
        }


        VD($inputs);
        die;

        //if($inputs->error()){
        //}
        
        
        /**
          * @var Filter
          */
        $filter = PROVIDER::GET('filter');
        $request = new Request();

        $email = $request->getPost('email', null, '');
        $email = $filter->sanitize($email, ['injection', 'spaces']);
        
        $pass = $request->getPost('pass', null, '');
        $pass = $filter->sanitize($pass, ['injection']);


        $validation = new Validation();
        $validation->add('email', new PresenceOf(['message' => 'The e-mail is required']));
        $validation->add('email', new Email(['message' => 'The e-mail is not valid']));

        $errors = $validation->validate([
            'email' => $email,
            'pass' => $pass,
        ]);
        //if(count($errors)){
        //    $this->setError("Login Error!", 1, $errors);
        //}

        
    }

}
