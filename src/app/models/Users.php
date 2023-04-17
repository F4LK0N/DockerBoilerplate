<? defined("FKN") or http_response_code(403).die('Forbidden!');

use Phalcon\Mvc\Model;

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
    public $id;
    public $access_type;

    public $email;
    public $pass;

    public $name;
    public $surname;

}
