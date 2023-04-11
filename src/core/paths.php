<?php

### SOURCE ###

# ROOT
$temp = dirname(__DIR__);
while(false!==strpos($temp, '\\')){ $temp = str_replace('\\', '/', $temp); }
while(false!==strpos($temp, '//')){ $temp = str_replace('//', '/', $temp); }
$temp = rtrim($temp,"/");
define('ROOT', $temp);
unset($temp);

# FOLDERS
define('APP_PATH', ROOT.'/app');
define('CONFIGS_PATH', ROOT.'/configs');
define('CORE_PATH', ROOT.'/core');
define('PUBLIC_PATH', ROOT.'/public');
define('TESTS_PATH', ROOT.'/tests');



### HTML ###

# ROOT
$temp = $_SERVER["REQUEST_URI"];
//$temp
var_dump($temp);
while(false!==strpos($temp, '\\')){ $temp = str_replace('\\', '/', $temp); }
if(substr($temp, 0, 1)==='/'){ $temp=substr($temp, 1); }
$deep=substr_count($temp, '/');
$temp='';
while($deep>0){
    $temp.='../';
    $deep--;
}
define('HTML_ROOT', $temp);
var_dump($temp);
unset($temp, $deep);
//die;

?>

<head>
	<link rel="stylesheet" type="text/css" href="<?= HTML_ROOT ?>css/main.css">
	<link rel="stylesheet" type="text/css" href="<?= HTML_ROOT ?>css/inexist.css">
	<link rel="stylesheet" type="text/css" href="<?= HTML_ROOT ?>js/main.js">
	<link rel="stylesheet" type="text/css" href="<?= HTML_ROOT ?>js/inexist.js">
	<link rel="stylesheet" type="text/css" href="<?= HTML_ROOT ?>abc.txt">
</head>

<?php var_dump($_SERVER);
