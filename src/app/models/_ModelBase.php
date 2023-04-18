<? defined("FKN") or http_response_code(403).die('Forbidden!');

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset;

trait _Behavior_Status
{
    public function beforeCreate()
    {
        echo('STATUS beforeCreate');
        echo(@$this->id).'\n';
        $this->skipOperation(true);
        
    }
    public function create(): bool
    {
        echo('STATUS create');
        echo(@$this->id).'\n';
        $this->skipOperation(true);
        return true;
    }
    public function afterCreate()
    {
        echo('STATUS afterCreate');
        echo(@$this->id).'\n';
        $this->skipOperation(true);
    }


    public function beforeUpdate()
    {
        $this->skipOperation(true);
        
        //VD('STATUS beforeUpdate');
    }
    
    public function beforeDelete()
    {
        $this->skipOperation(true);
        
        //VD('STATUS beforeDelete');
    }
    
}

trait _Behavior_Subversion
{
    public function beforeCreate()
    {
        
    }

    public function beforeUpdate()
    {
        
    }
    
}

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
