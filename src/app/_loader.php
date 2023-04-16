<? defined("FKN") or http_response_code(403).die('Forbidden!');

require_once PATH_APP . "/_config/_config.php";
require_once PATH_APP . "/_provider/_provider.php";
require_once PATH_APP . "/_application/_application.php";

_APPLICATION::RUN();
