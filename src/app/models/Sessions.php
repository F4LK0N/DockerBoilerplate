<? defined("FKN") or http_response_code(403).die('Forbidden!');

use Phalcon\Mvc\Model;
use Phalcon\Db\Column;
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Mvc\Model\Resultset;

class Sessions extends _ModelBase
{
    static private $timeoutInMinutes = 120;

    static private function getSessionExpireTimestamp(): string
    {
        return date('Y-m-d H:i:s', (time() + intval(60 * self::$timeoutInMinutes)));
    }


    
    public $id;
    public $id_user;
    public $token;
    public $expires;



    public function initialize()
    {
        
    }

    static public function startSession(string $userId): Result
    {
        $result = new Result();

        $session          = new Sessions();
        $session->id_user = $userId;
        $session->token   = PROVIDER::GET_SHARED('security')->sessionToken();
        $session->expires = self::getSessionExpireTimestamp();
        
        try
        {
            if(!$session->save()){
                $result->setError(
                    eERROR::MODEL_TRANSACTION,
                    $session->getMessagesString()
                );
            }
            $result->setData([
                'token' => $session->token,
                'expires' => $session->expires,
            ]);
        }
        catch (\Exception $exception) {
            $result->setError(
                eERROR::MODEL_TRANSACTION + $exception->getCode(), 
                $exception->getMessage()
            );
        }

        return $result;
    }

}
