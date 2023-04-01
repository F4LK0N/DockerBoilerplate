#!/bin/bash
set -e

echo "Apache - PID Lock File Release"
rm -f /usr/local/apache2/logs/httpd.pid
