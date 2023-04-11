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
	<title>Project Name - Yo Apister</title>
	<link rel="stylesheet" type="text/css" href="<?= HTML_ROOT ?>_css/normalize-8.0.0.css">
	<link rel="stylesheet" type="text/css" href="<?= HTML_ROOT ?>test.txt">
	<link rel="stylesheet" type="text/css" href="<?= HTML_ROOT ?>css/main.css">
</head>

<?php var_dump($_SERVER);
