<? defined("FKN") or http_response_code(403).die('Forbidden!');
use Phalcon\Mvc\Controller;

class AuthController extends _BaseController
{
    public function indexAction()
    {
        $data = [
            'session' => [
                'token' => ($_COOKIE[CONFIG::GET('app', 'session-token-key')] ?? ''),
                'logged' => false,
            ],
            'action' => ($_POST['action'] ?? $_GET['action'] ?? ''),
            'update' => ($_GET['update'] ?? 0),
        ];
        $data['session']['logged'] = $data['session']['token'] !== '';
        $this->view->data = $data;
        

        $this->login($data);
        $this->logout($data);
    }

    private function login(&$data)
    {
        if($data['action']==="LOGIN"){
            if($data['update']===0){
                setcookie(CONFIG::GET('app', 'session-token-key'), time());
                $data['update']=4;
            }

            
            if($data['update']>=1 && $data['session']['token']===''){
                header('Location: '.HTML_ROOT.'auth/?action=LOGIN&update='.(--$data['update']), 205);
                exit;
            }

            header('Location: '.HTML_ROOT, 205);
            exit;
        }
    }

    private function logout(&$data)
    {
        if($data['action']==="LOGOUT"){
            if($data['update']===0){
                setcookie(CONFIG::GET('app', 'session-token-key'), '');
                $data['update']=4;
            }

            if($data['update']>=1 && $data['session']['token']!==''){
                header('Location: '.HTML_ROOT.'auth/?action=LOGOUT&update='.(--$data['update']), 205);
                exit;
            }

            header('Location: '.HTML_ROOT, 205);
            exit;
        }
    }

}
