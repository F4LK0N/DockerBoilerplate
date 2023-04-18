<? defined("FKN") or http_response_code(403).die('Forbidden!');

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Resultset;
use Phalcon\Messages\Message;
use Phalcon\Events\Manager;
use Phalcon\Events\Event;

class _ModelBehaviorBase extends Model
{
    protected bool     $eventsManagerEnable = false;
    protected ?Manager $eventsManager       = null;

    public function initialize(){
        if(!$this->eventsManagerEnable){
            return;
        }
        echo "BBB ";
        $this->eventsManager = new Manager();
    }

    protected function initializeAfter(): void
    {
        if(!$this->eventsManagerEnable){
            return;
        }
        echo "BBA ";
        //VDD($this->eventsManager);
        $this->setEventsManager($this->eventsManager);
    }

}


class _Model_Subversion extends _ModelBehaviorBase
{
    private $behaviorSubversionEnabled = false;

    protected function behaviorSubversionEnabled($enabled=null){
        if($enabled!==null){
            $this->behaviorSubversionEnabled = boolval($enabled);
            $this->eventsManagerEnable = ($this->eventsManagerEnable || $this->behaviorSubversionEnabled);
        }
        return $this->behaviorSubversionEnabled;
    }

    public function initialize()
    {
        parent::initialize();
        if(!$this->behaviorSubversionEnabled){
            return;
        }
        echo "SUBVERSION ";

    }
    
}

class _Model_Status extends _Model_Subversion
{
    private $behaviorStatusEnabled = false;

    protected function behaviorStatusEnabled($enabled=null)
    {
        if($enabled!==null){
            $this->behaviorStatusEnabled = boolval($enabled);
            $this->eventsManagerEnable = ($this->eventsManagerEnable || $this->behaviorStatusEnabled);
        }
        return $this->behaviorStatusEnabled;
    }

    public function initialize()
    {
        parent::initialize();
        if(!$this->behaviorStatusEnabled){
            return;
        }
        echo "STATUS ";

        $this->behaviorStatusBeforeSave();
        $this->behaviorStatusBeforeCreate();
    }

    private function behaviorStatusBeforeSave()
    {
        $this->eventsManager->attach(
            'model:beforeSave',
            function (Event $event, $model) {
                VD($event);
                VD($model);

                return true;
            }
        );
    }

    private function behaviorStatusBeforeCreate()
    {
        $this->eventsManager->attach(
            'model:beforeCreate',
            function (Event $event, $model) {
                VD($event);
                VD($model);
                return true;
            }
        );
    }
    
    //public function beforeCreate()
    //{
    //    if(!$this->behaviorStatusEnabled){
    //        return;
    //    }

    //    echo("STATUS beforeCreate\n");
    //    $this->skipOperation(true);
    //    $message = new Message(
    //        "STATUS beforeCreate"
    //    );
    //    $this->appendMessage($message);
    //}
    //public function create(): bool
    //{
    //    if(!$this->behaviorStatusEnabled){
    //        return true;
    //    }

    //    echo("STATUS create\n");
    //    $this->skipOperation(true);
    //    //echo(@$this->id).'\n';
    //    //$this->skipOperation(true);
    //    return true;
    //}
    //public function afterCreate()
    //{
    //    if(!$this->behaviorStatusEnabled){
    //        return;
    //    }

    //    echo("STATUS afterCreate\n");
    //    $this->skipOperation(true);
    //    $message = new Message(
    //        "STATUS afterCreate"
    //    );
    //    $this->appendMessage($message);
    //}


    //public function beforeUpdate()
    //{
    //    //$this->skipOperation(true);
        
    //    //VD('STATUS beforeUpdate');
    //}
    
    //public function beforeDelete()
    //{
    //    //$this->skipOperation(true);
        
    //    //VD('STATUS beforeDelete');
    //}
    
}

class _ModelBase extends _Model_Status
{
    public function initialize()
    {
        echo "BASE ";
        parent::initialize();
        $this->initializeAfter();
        echo "BASE ";
        
        
    }

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
