#!/bin/sh
set -e


echo "OS - Logs"
rm -r -f /logs/os/
mkdir -p /logs/os/
chmod 777 /logs/os/
ln -s /var/log/ /logs/os/



echo "Apache - Logs"
rm -r -f /logs/apache/
mkdir -p /logs/apache/
chmod 777 /logs/apache/



echo "PHP - Data"
mkdir -p /data/php/tmp/
chmod 777 /data/php/tmp/

echo "PHP - Logs"
mkdir -p /logs/php/
chmod 777 /logs/php/

rm -f /logs/php/errors.log
touch /logs/php/errors.log
chmod 777 /logs/php/errors.log

rm -f /logs/php/xdebug.log
touch /logs/php/xdebug.log
chmod 777 /logs/php/xdebug.log

rm -r -f /logs/php/xdebug_tmp
mkdir -p /logs/php/xdebug_tmp
chmod 777 /logs/php/xdebug_tmp
chmod 777 -R /logs/php/xdebug_tmp



echo "Application - File System"
mkdir -p /app/
mkdir -p /app/public/
chmod 777 /app/
#chmod 777 -R /app/

echo "Application - Composer"
if [[ ! -f "/app/composer.json" ]]; then
    echo "- 'composer.json' not found!"
else
    echo "- 'composer.json' found!"

    if [[ -f "/app/composer.lock" ]]; then
        echo "- 'composer.lock' found!"
        echo "- Skipping installation."
    else
        echo "- 'composer.lock' not found!"
        echo "- Starting installation."

        composer install -d /app
    fi

fi
