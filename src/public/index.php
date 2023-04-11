<?php
require "../core/_loader.php";
die;






$application = new Application($container);

try {
    $response = $application->handle(
        $_SERVER["REQUEST_URI"]
    );
    $response->send();
} 
catch (\Exception $e) {
    echo 'Exception: ', $e->getMessage();
}
