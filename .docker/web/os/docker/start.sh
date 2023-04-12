#!/bin/sh
set -e


echo "Directories - Logs"
rm -rf \
    /logs/os \
    /logs/apache \
    /logs/php;
mkdir --mode=777 --parents \
    /logs/os \
    /logs/apache \
    /logs/php;
chmod 777 \
    /logs \
    /logs/os \
    /logs/apache \
    /logs/php;

echo "Directories - Data"
mkdir --mode=777 --parents \
    /data/os \
    /data/apache \
    /data/php;
chmod 777 \
    /data \
    /data/os \
    /data/apache \
    /data/php;



echo "OS - Logs"
ln -s /var/log/ /logs/os/



echo "PHP - Data"
mkdir --mode=777 --parents /data/php/tmp
chmod 777 /data/php/tmp



echo "Application - Source"
mkdir --mode=777 --parents \
    /app \
    /app/public;
chmod 777 \
    /app \
    /app/public;

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
