<? defined("FKN") or http_response_code(403).die('Forbidden!');

use Phalcon\Db\Adapter\Pdo\Mysql;

PROVIDER::SET(
    'db',
    function () {
        $dbConfig = CONFIG::GET('db')['main'];
        return new Mysql(
            [
                'host'     => $dbConfig['host'],
                'username' => $dbConfig['username'],
                'password' => $dbConfig['password'],
                'dbname'   => $dbConfig['dbname'],
            ]
        );
    }
);
