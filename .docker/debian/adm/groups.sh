#!/bin/bash

full=$( cat /etc/group )
short=$( cat /etc/group | cut -d\: -f1 )

echo "$ADM_LOGO"
echo "$ADM_DIVIDER"
echo "### GROUPS ###"
echo "$ADM_DIVIDER"

echo "COMMANDS:"
echo "$ADM_DIVIDER"
echo "- groupadd"
echo "- groupmod"
echo "- groupdel"
echo "$ADM_DIVIDER"

echo "FULL LIST:"
echo "$ADM_DIVIDER"
echo "$full"
echo "$ADM_DIVIDER"

echo "SHORT LIST:"
echo "$ADM_DIVIDER"
echo "$short"
echo "$ADM_DIVIDER"
