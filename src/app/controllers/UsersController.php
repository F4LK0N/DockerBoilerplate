<? defined("FKN") or http_response_code(403).die('Forbidden!');
use Phalcon\Mvc\Controller;

class UsersController extends _BaseController
{
    public function listAction()
    {
        print 'list';
    }

    public function viewAction()
    {
        print 'view';
    }

    public function addAction() 
    {
        $user        = new Users();
        $user->name  = 'name';
        $user->email = 'email';
        $success = $user->save();
        $this->setResponse($success);
    }
    
    
    public function editAction()
    {
        print 'edit';

        $id = $this->dispatcher->getParam('id');
        vd($id);
    }

    public function remAction()
    {
        print 'rem';
    }
    
}
