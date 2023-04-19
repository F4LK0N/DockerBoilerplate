<? defined("FKN") or http_response_code(403).die('Forbidden!');

use Phalcon\Mvc\Controller;
use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Mvc\Model\Resultset;

class UsersController extends _BaseController
{
    public function listAction()
    {
        $users = Users::find();
        $this->setData(
            $users
        );
    }

    public function viewAction()
    {
        $id = $this->dispatcher->getParam('id');
        $user = Users::findFirstById($id);
        if($user===null){
            $this->setError(
                'Not found!',
                404
            );
        }
        $this->setData(
            $user
        );
    }

    public function addAction() 
    {
        $inputs = PROVIDER::GET('inputs')->post([
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
            'name' => [
                'filters' => [
                    'injection',
                    'double-spaces'],
                'validations' => [
                    'type'=>'string',
                    'required'=>true],
            ],
            'surname' => [
                'filters' => [
                    'injection',
                    'double-spaces'],
                'validations' => [
                    'type'=>'string',
                    'required'=>true],
            ],
        ]);
        if($inputs->hasErrors()){
            $this->setError(eERROR_CODES::CONTROLLER_INPUT + $inputs->getErrorCode(), $inputs->getErrorDetails());
        }

        try
        {
            $user          = new Users();
            $user->email   = $inputs->get('email');
            $user->pass    = PROVIDER::GET_SHARED('security')->passHash($inputs->get('email'), $inputs->get('pass'));
            $user->name    = $inputs->get('name');
            $user->surname = $inputs->get('surname');

            if(!$user->save()){
                throw new Exception($user->getMessagesString());
            }

            $this->setData(['user'=>[
                'id' => $user->id,
                'email' => $user->email,
                'name' => $user->name,
            ]]);
        }
        catch (\Exception $exception) {
            $this->setError(eERROR_CODES::CONTROLLER_TRANSACTION + $exception->getCode(), $user->getMessagesString($exception->getMessage()));
        }
    }
    
    public function editAction()
    {
        //$params = [
        //    'email'   => 
        //    'pass'    => 
        //    'name'    => 
        //    'surname' => 
        //    'name'    => 
        //];

        $id = $this->dispatcher->getParam('id');
        $user = Users::findFirstById($id);
        if($user===null){
            $this->setError(
                'Not found!',
                404
            );
        }

        if(!$user->save()){
            $this->setError(
                'Saving error!',
                400
            );
        }
        $this->setData(
            $user
        );
    }

    public function remAction()
    {
        $id = $this->dispatcher->getParam('id');
        $user = Users::findFirstById($id);
        if($user===null){
            $this->setError(
                'Not found!'
            );
        }

        if (!$user->delete()) {
            $this->setError('Removing error!', 400);
        }
    }
    
}
