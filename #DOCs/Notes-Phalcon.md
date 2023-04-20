# Dependencies
https://docs.phalcon.io/4.0/en/installation
https://github.com/jbboehr/php-psr




# Web Server Setup
https://github.com/phalcon/cphalcon/issues/16213
https://docs.phalcon.io/5.0/en/webserver-setup
<IfModule mod_rewrite.c>

    <Directory "/var/www/test">
        RewriteEngine on
        RewriteRule  ^$ public/    [L]
        RewriteRule  ((?s).*) public/$1 [L]
    </Directory>

    <Directory "/var/www/tutorial/public">
        RewriteEngine On
        RewriteCond   %{REQUEST_FILENAME} !-d
        RewriteCond   %{REQUEST_FILENAME} !-f
        RewriteRule   ^((?s).*)$ index.php?_url=/$1 [QSA,L]
    </Directory>

</IfModule>



# Dev Tools
https://docs.phalcon.io/5.0/en/devtools
```
composer require phalcon/devtools
alias phalcon=/app/vendor/phalcon/devtools/phalcon
```


# Debug
XDebug
https://xdebug.org/docs/all_settings
```
?XDEBUG_TRIGGER=1
```

# Auto Loader
https://docs.phalcon.io/5.0/en/autoload
https://docs.phalcon.io/5.0/en/api/phalcon_autoload#autoload-loader
https://github.com/phalcon/cphalcon/blob/5.0.x/phalcon/Autoload/Loader.zep



# Migrations
https://docs.phalcon.io/5.0/en/db-migrations

# Unit Tests
https://docs.phalcon.io/5.0/en/unit-testing



# Tutorial Basic
https://docs.phalcon.io/5.0/en/tutorial-basic

index.php
```
<?php

use Phalcon\Di\FactoryDefault;
use Phalcon\Autoload\Loader;
use Phalcon\Mvc\View;
use Phalcon\Mvc\Application;
use Phalcon\Url;


define('BASE_PATH',   dirname(__DIR__));
define('APP_PATH',    BASE_PATH . '/app');
define('CORE_PATH',   BASE_PATH . '/core');
define('PUBLIC_PATH', BASE_PATH . '/public');


$loader = new Loader();
$loader->setNamespaces(
    [
       'App'        => 'app/',
       'App\Models' => 'app/models',
       'Tests' => 'tests/',
    ]
);
$loader->setDirectories(
    [
        APP_PATH . '/controllers/',
        APP_PATH . '/models/',
    ]
);
$loader->register();


$container = new FactoryDefault();
$container->set(
    'view',
    function () {
        $view = new View();
        $view->setViewsDir(APP_PATH . '/views/');
        return $view;
    }
);
$container->set(
    'url',
    function () {
        $url = new Url();
        $url->setBaseUri('/');
        return $url;
    }
);


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
```

IndexController.php
```
<?php

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        return '<h1>Hello!</h1>';
    }
    
}
```




# Intelisense
https://stackoverflow.com/questions/62808874/how-to-enable-intelisense-for-phalcon-in-vs-code



# Router
https://docs.phalcon.io/5.0/en/routing
https://docs.phalcon.io/5.0/en/application



# CORS
https://developer.mozilla.org/en-US/docs/Web/HTTP/Headers/Cache-Control



# MySQL Charset and Collations
https://dev.mysql.com/doc/refman/8.0/en/charset-unicode-sets.html

https://dev.mysql.com/doc/refman/8.0/en/charset-unicode-sets.html#charset-unicode-sets-uca

https://dev.mysql.com/doc/refman/8.0/en/charset-unicode-sets.html#charset-unicode-sets-language-specific-collations

http://www.unicode.org/Public/UCA/9.0.0/allkeys.txt

```
DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci
```

# MySQL Engines
```
ENGINE=MyISAM
ENGINE=InnoDB
```


# PHP Faker
https://fakerphp.github.io/


# Phalcon Filters
https://docs.phalcon.io/5.0/en/filter-filter

# Phalcon Validation
https://docs.phalcon.io/3.4/en/validation
https://docs.phalcon.io/5.0/en/db-models-validation


# Models
https://phalcon-nucleon.github.io/#!database/models.html
