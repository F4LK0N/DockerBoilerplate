#!/bin/sh
set -e


echo "OS - Logs"
rm -r -f /logs/os/
mkdir -p /logs/os/
ln -s /var/log/ /logs/os/



echo "Apache - Logs"
#rm -r -f /logs/apache/
mkdir -p /logs/apache/



echo "PHP - Logs"
mkdir -p /logs/php/
chmod 777 /logs/php/
chmod 777 -R /logs/php/

touch /logs/php/errors.log
chmod 777 /logs/php/errors.log

touch /logs/php/xdebug.log
chmod 777 /logs/php/xdebug.log

mkdir -p /logs/php/xdebug_tmp
chmod 777 /logs/php/xdebug_tmp
chmod 777 -R /logs/php/xdebug_tmp



echo "Application - File System"
mkdir -p /app/
mkdir -p /app/public/
