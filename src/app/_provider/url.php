<? defined("FKN") or http_response_code(403).die('Forbidden!');

use Phalcon\Mvc\Url;

PROVIDER::SET_SHARED(
    'url',
    function () {
        $url = new Url();
        $url->setBaseUri(HTML_ROOT);
        return $url;
    }
);
