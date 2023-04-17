<? defined("FKN") or http_response_code(403).die('Forbidden!');
use Phalcon\Mvc\Controller;

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
        //$params = [
        //    'email'   => 
        //    'pass'    => 
        //    'name'    => 
        //    'surname' => 
        //    'name'    => 
        //];
        $faker = Faker\Factory::create();
        
        $user          = new Users();
        $user->pass    = md5($user->name.'.'.$user->surname);
        $user->name    = $faker->firstName();
        $user->surname = $faker->lastName();
        $user->email   = $user->name.'.'.$user->surname.'@gmail.com';
        if(!$user->save()){
            $this->setError(
                'Error adding!',
                400
            );
        }

        $this->setData([
            'id' => $user->id,
        ]);
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
