#!/bin/bash
set -e

echo "OS - Logs Folder"
rm -r /logs/os/
mkdir -p /logs/os/
ln -s /var/log/ /logs/os/

echo "Apache - Logs Folder"
mkdir -p /logs/apache/

echo "Apache - PID File"
rm -f /usr/local/apache2/logs/httpd.pid
rm -f /logs/apache/httpd.pid
