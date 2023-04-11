<?php

### VAR DUMP ###

function VD($var)
{
    var_dump($var);
}

function VDD($var)
{
    var_dump($var);
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

