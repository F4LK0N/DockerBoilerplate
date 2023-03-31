#!/bin/bash

full=$( cat /etc/group )
short=$( cat /etc/group | cut -d\: -f1 )

echo "$ADM_LOGO"
echo "$ADM_DIVIDER"
echo "### GROUPS ###"
echo "$ADM_DIVIDER"
echo " 1 = Commands"
echo " 2 = Full List"
echo " 3 = Short List"
echo "$ADM_DIVIDER"

echo -n "Enter option: "
read arg

echo "$ADM_DIVIDER"

if [ $arg == "1" ]; then
    echo "groupadd"
    echo "groupmod"
    echo "groupdel"
fi

if [ $arg == "2" ]; then
    echo "$full"
fi

if [ $arg == "3" ]; then
    echo "$short"
fi

echo "$ADM_DIVIDER"
