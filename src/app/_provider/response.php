<? defined("FKN") or http_response_code(403).die('Forbidden!');

use Phalcon\Http\Response;

PROVIDER::SET(
    'response',
    function () {
        $response = new Response();
        
        $response->setStatusCode(200, 'OK');

        $expiryDate = new DateTime();
        $expiryDate->modify('-10 minutes');

        //$response->setExpires($expiryDate);
        $response->setLastModified($expiryDate);

        return $response;
    }
);
