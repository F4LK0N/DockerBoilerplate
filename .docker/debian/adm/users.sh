#!/bin/bash

full=$( cat /etc/passwd )
short=$( cat /etc/passwd | cut -d\: -f1 )

echo "$ADM_LOGO"
echo "$ADM_DIVIDER"
echo "### USERS ###"
echo "$ADM_DIVIDER"

echo "COMMANDS:"
echo "$ADM_DIVIDER"
echo "- useradd"
echo "- usermod"
echo "- userdel"
echo "$ADM_DIVIDER"

echo "FULL LIST:"
echo "$ADM_DIVIDER"
echo "$full"
echo "$ADM_DIVIDER"

echo "SHORT LIST:"
echo "$ADM_DIVIDER"
echo "$short"
echo "$ADM_DIVIDER"
