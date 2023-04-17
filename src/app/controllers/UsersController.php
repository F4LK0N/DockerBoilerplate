<? defined("FKN") or http_response_code(403).die('Forbidden!');
use Phalcon\Mvc\Controller;

class UsersController extends _BaseController
{
    public function listAction()
    {
        $users = Users::find();
        $this->setResponse(
            $users
        );
    }

    public function viewAction()
    {
        $id = $this->request->getQuery('id');
        $user = Users::findFirstById($id);
        $this->setResponse(
            $user
        );
    }

    public function addAction() 
    {
        $user        = new Users();
        $user->name  = 'name';
        $user->email = 'email';
        if(!$user->save()){
            $this->setError(
                'Error adding!'
            );
        }
        $this->setResponse([
            'id' => $user->id,
        ]);
    }
    
    public function editAction()
    {
        $id = $this->request->getQuery('id');
        $user = Users::findFirstById($id);
        $user->name = time();
        if(!$user->save()){
            $this->setError(
                'Error adding!'
            );
        }
        $this->setResponse(
            $user
        );
    }

    public function remAction()
    {
        $id = $this->request->getQuery('id');
        $user = Users::findFirstById($id);
        if (!$user->delete()) {
            $this->setError(
                'Error removing!'
            );
        }
    }
    
}
