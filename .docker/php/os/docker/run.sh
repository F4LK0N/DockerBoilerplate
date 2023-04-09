#!/bin/sh
set -e

echo "Apache - Server Daemon"
exec httpd -D FOREGROUND
