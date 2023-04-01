#!/bin/bash

full=$( cat /etc/passwd )
short=$( cat /etc/passwd | cut -d\: -f1 )

echo "$ADM_LOGO"
echo "$ADM_DIVIDER"
echo "### USERS ###"
echo "$ADM_DIVIDER"
echo " 1 = Commands"
echo " 2 = Full List"
echo " 3 = Short List"
echo "$ADM_DIVIDER"

echo -n "Enter option: "
read arg

echo "$ADM_DIVIDER"

if [ $arg == "1" ]; then
    echo "useradd"
    echo "usermod"
    echo "userdel"
fi

if [ $arg == "2" ]; then
    echo "$full"
fi

if [ $arg == "3" ]; then
    echo "$short"
fi

echo "$ADM_DIVIDER"
