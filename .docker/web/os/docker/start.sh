#!/bin/sh
set -e

echo "FILESYSTEM - CREATE";
# OS
mkdir -p --mode=777 ${OS_DATA}
mkdir -p --mode=777 ${OS_LOGS}
# Apache
mkdir -p --mode=777 ${HTTPD_DATA}
mkdir -p --mode=777 ${HTTPD_LOGS}
# PHP
mkdir -p --mode=777 ${PHP_DATA}
mkdir -p --mode=777 ${PHP_LOGS}
# Application
mkdir -p --mode=777 ${APP_ROOT}/public

echo "FILESYSTEM - PERMISSIONS";
# OS
chmod 777 ${OS_DATA}
chmod 777 ${OS_LOGS}
# Apache
chmod 777 ${HTTPD_DATA}
chmod 777 ${HTTPD_LOGS}
# PHP
chmod 777 ${PHP_DATA}
chmod 777 ${PHP_LOGS}
# Application
chmod 777 ${APP_ROOT}
chmod 777 ${APP_ROOT}/public

echo "LOGS";
ln -s /var/log/ ${OS_LOGS}

echo "APPLICATION - COMPOSER"
if [[ ! -f "${APP_ROOT}/composer.json" ]]; then
    echo "- 'composer.json' not found!"
else
    echo "- 'composer.json' found!"

    if [[ -f "${APP_ROOT}/composer.lock" ]]; then
        echo "- 'composer.lock' found!"
        echo "- Skipping installation."
    else
        echo "- 'composer.lock' not found!"
        echo "- Starting installation."

        composer install -d ${APP_ROOT}
    fi

fi
