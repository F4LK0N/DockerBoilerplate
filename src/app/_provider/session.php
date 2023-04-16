<? defined("FKN") or http_response_code(403).die('Forbidden!');

class Session
{
    private bool    $loaded   = false;
    private string  $tokenKey = '';
    private string  $token    = '';
    private bool    $logged   = false;
    private int     $id       = 0;
    private ?object $user     = null;
    
    public function __construct ($autoStart=true)
	{
        if(!$autoStart || $this->loaded){
            return;
        }
        $this->loaded = true;

        $this->LoadToken();
        $this->Refresh();
    }

    private function LoadToken()
    {
        $this->tokenKey = CONFIG::GET('app', 'session-token-key');
        $this->token    = $_COOKIE[$this->tokenKey] ?? '';
    }

    private function Refresh()
    {
        if($this->token===''){
            return;
        }

        //API

        
        $this->logged = true;
    }

}


PROVIDER::SET_SHARED(
    'session',
    function () {
        $session = new Session();
        return $session;
    }
);
