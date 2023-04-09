#!/bin/bash
set -e

echo "OS - Logs Folder"
rm -r -f /logs/debian/
mkdir -p /logs/debian/
ln -s /var/log/ /logs/debian/
