<? defined("FKN") or http_response_code(403).die('Forbidden!');

### VAR DUMP ###

function VD($var)
{
    $caller = debug_backtrace(1)[0];
    echo "<small>".substr($caller['file'], 5).':'.$caller['line']."</small><pre>";
    print_r($var);
    echo "</pre>\n";
}

function VDD($var)
{
    $caller = debug_backtrace(1)[0];
    echo "<small>".substr($caller['file'], 5).':'.$caller['line']."</small><pre>";
    print_r($var);
    echo "</pre>\n";
    die;
}



### DECLARED ###
function VD_ALL()
{
    VD_VARIABLES();
    VD_FUNCTIONS();
    VD_CLASSES();
}

function VDD_ALL()
{
    VD_ALL();
    die;
}

function VD_VARIABLES()
{
    print"VARIABLES<br>\n";
    var_dump(get_defined_vars());
}

function VD_FUNCTIONS()
{
    print"FUNCTIONS<br>\n";
    var_dump((get_defined_functions())['user']);
}

function VD_CLASSES()
{
    print"CLASSES<br>\n";
    var_dump(get_declared_classes());
}

