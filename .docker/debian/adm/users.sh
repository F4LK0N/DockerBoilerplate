#!/bin/bash

full=$( cat /etc/passwd )
short=$( cat /etc/passwd | cut -d\: -f1 )

echo "COMMANDS:"
echo "- useradd"
echo "- usermod"
echo "- userdel"
echo ""

echo "LIST:"
echo "$full"
echo ""
echo "$short"
