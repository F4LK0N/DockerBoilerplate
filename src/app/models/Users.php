<? defined("FKN") or http_response_code(403).die('Forbidden!');

use Phalcon\Mvc\Model;
use Phalcon\Db\Column;
use Phalcon\Mvc\Model\Criteria;
use Phalcon\Mvc\Model\Resultset;

enum eUserTypes 
{
    case DEV;
    case MASTER;
    case ADMIN;
    case MANAGER;
    case EDITOR;
    case READER;
}

class Users extends _ModelBase
{
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

    static public function findByLogin(string $email, string $pass): Result
    {
        $result = new Result();

        $inputs = PROVIDER::GET('inputs');
        $inputs->values([
            'email' => [
                'value' => $email,
                'filters' => [
                    'injection',
                    'spaces'],
                'validations' => [
                    'type'=>'email',
                    'required'=>true],
            ],
            'pass' => [
                'value' => $pass,
                'filters' => [
                    'injection',
                    'spaces'],
                'validations' => [
                    'type'=>'pass',
                    'required'=>true],
            ],
        ]);
        if($inputs->hasErrors()){
            $result->setError(
                eERROR_CODES::MODEL_INPUT + $inputs->getErrorCode(),
                $inputs->getErrorDetails()
            );
            return $result;
        }

        $email = $inputs->get('email');
        $pass  = $inputs->get('pass');
        $pass  = PROVIDER::GET_SHARED('security')->passHash($email, $pass);
        
        /** @var ResultSet $resultset */
        $resultset = Users::query()
            ->columns('id,access_type,email,name,surname')
            ->where('status = 1')
            ->andWhere('email = :email:')
            ->andWhere('pass = :pass:')
            ->bind([
                'email' => $email,
                'pass'  => $pass,
            ])
        ->execute();
        if($resultset->count()!==1){
            $result->setError(
                eERROR_CODES::MODEL_NOT_FOUND,
                'User not found!'
            );
            return $result;
        }
        $user = $resultset->getFirst()->toArray();
        $result->setData($user);
        return $result;
    }

}
