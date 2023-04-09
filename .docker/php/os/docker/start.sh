#!/bin/sh
set -e

echo "OS - Logs Folder"
rm -r -f /logs/os/
mkdir -p /logs/os/
ln -s /var/log/ /logs/os/
