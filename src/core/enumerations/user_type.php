<? defined("FKN") or http_response_code(403).die('Forbidden!');

class eUSER_TYPE
{
    const DEVELOPER = 1;
    const MASTER    = 2;
    const ADMIN     = 3;
    const MANAGER   = 4;
    const EDITOR    = 5;
    const READER    = 6;
}
