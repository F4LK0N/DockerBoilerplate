<? defined("FKN") or http_response_code(403).die('Forbidden!');

use Phalcon\Mvc\Model;

enum eUserTypes 
{

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