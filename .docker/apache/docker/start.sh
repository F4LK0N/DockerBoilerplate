#!/bin/bash
set -e

echo "Logs - Symlink"

echo "Apache - Clear PID File"
rm -f /usr/local/apache2/logs/httpd.pid
