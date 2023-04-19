<? defined("FKN") or http_response_code(403).die('Forbidden!');

use Phalcon\Mvc\Model;

class _ModelBase extends Model
{
    
    public function getMessagesString($messages='')
    {
        if($messages===''){
            $messages = parent::getMessages();
        }
        
        if(is_array($messages)){
            $messages = implode('\n', $messages);
        }

        if(stripos($messages, "'users.UK_EMAIL'")){
            $messages = "'email': already exists!";
        }else{
            $messages = "Error saving!";
        }

        return $messages;
    }

}
