#!/bin/sh
set -e

echo "OS - Logs Folder"
rm -r -f /logs/alpine/
mkdir -p /logs/alpine/
ln -s /var/log/ /logs/alpine/
