# Shell Config

https://stackoverflow.com/questions/38024160/how-to-get-etc-profile-to-run-automatically-in-alpine-docker

Dockerfile:
```
ENV ENV="/root/.ashrc"
```


# XDebug
https://xdebug.org/docs/all_settings

```
127.0.0.1/?XDEBUG_TRIGGER
```



https://github.com/phalcon/cphalcon/issues/16213




# Web Server Setup
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
# ...

# Migrations
https://docs.phalcon.io/5.0/en/db-migrations

# Unit Tests
https://docs.phalcon.io/5.0/en/unit-testing
