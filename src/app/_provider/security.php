<? defined("FKN") or http_response_code(403).die('Forbidden!');

class Security
{
    public function hash128(string $value): string
    {
        $iterations = (10 + (strlen($value)%3));

        $value = sha1($value);

        return $value;
    }

    public function passHash(string $email, string $pass): string
    {
        $iterations = (10 + (strlen($email)%3));
        
        for($i=0; $i<$iterations; $i++){
            $email = md5(sha1($email));
            $pass  = sha1(md5($pass));
        }
        for($i=0; $i<$iterations; $i++){
            $email = md5(sha1($email.$pass));
            $pass  = sha1(md5($email.$pass));
        }
        for($i=0; $i<$iterations; $i++){
            $pass = substr(sha1(md5($pass)).md5(sha1($pass)).sha1($pass).md5($pass).sha1($pass), 32, 128);
        }

        return $pass;
    }

    public function sessionToken(): string
    {
        return substr($this->passHash(time(), microtime()), 32, 64);
    }

}

PROVIDER::SET_SHARED(
    'security',
    function () {
        $security = new Security();
        return $security;
    }
);
