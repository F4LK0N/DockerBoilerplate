<? defined("FKN") or http_response_code(403).die('Forbidden!');

use Phalcon\Mvc\Model;
use Phalcon\Db\Column;

trait ModelBehaviorStatus
{
    public function beforeCreate()
    {
        
    }

    public function beforeUpdate()
    {
        
    }
    
}

enum eUserTypes 
{
    case DEV;
    case MASTER;
    case ADMIN;
    case MANAGER;
    case EDITOR;
    case READER;
}

class Users extends Model
{
    use ModelBehaviorStatus;


    public $id;
    public $access_type;

    public $email;
    public $pass;

    public $name;
    public $surname;



    public function initialize()
    {
        //$this->skipAttributes([
        //    'pass',
        //]);
        //$this->skipAttributesOnCreate([
        //    'created_at',
        //]);
        //$this->skipAttributesOnUpdate([
        //    'pass',
        //]);

        //$this->setSource('users');
        //$this->primary('id', Column::TYPE_INTEGER);
        //$this->column('name', Column::TYPE_VARCHAR);
        //$this->column('email', Column::TYPE_VARCHAR);
        //$this->column('password', Column::TYPE_VARCHAR);
        //$this->column('remember_token', Column::TYPE_VARCHAR, [
        //    'nullable' => true
        //]);
        //$this->column('create_at', Column::TYPE_DATETIME, [
        //    'autoInsert' => true,
        //]);
        //$this->column('update_at', Column::TYPE_DATETIME, [
        //    'autoInsert' => true,
        //    'autoUpdate' => true,
        //]);
    }

}
