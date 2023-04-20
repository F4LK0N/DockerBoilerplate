<? defined("FKN") or http_response_code(403).die('Forbidden!');

### PROFILER ###
//Start Time (Seconds)
define("PROFILER_TIME", microtime(true));
//Start Memory (Bytes)
define("PROFILER_MEMORY", memory_get_usage(false));
define("PROFILER_MEMORY_REAL", memory_get_usage(true));



require_once "dev.php";



//Core
require_once "basic/headers.php";
require_once "basic/enumerations.php";
require_once "basic/paths.php";
require_once "basic/server.php";

print "aaa";
////Libs
//require_once "helpers/0-debug.php";
//require_once "helpers/0-math.php";
//require_once "helpers/0-storage.php";
//require_once "helpers/0-time.php";

////Helpers
//require_once "helpers/1-json.php";
//require_once "helpers/2-id-list.php";
//require_once "helpers/2-string-list.php";
//require_once "helpers/3-profiling.php";
//require_once "helpers/4-file-system.php";


//require_once "dev.php";
