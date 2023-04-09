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
#rm -r -f /logs/php/
mkdir -p /logs/php/

echo "Application - File System"
mkdir -p /app/
mkdir -p /app/public/
