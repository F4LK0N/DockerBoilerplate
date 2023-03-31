#!/bin/bash

full=$( cat /etc/passwd )
short=$( cat /etc/passwd | cut -d\: -f1 )

echo "$ADM_LOGO"
echo "$ADM_DIVIDER"
echo "### PROCESSES ###"
echo "$ADM_DIVIDER"
echo " 1 = Commands"
echo " 2 = Full List"
echo " 3 = Short List"
echo "$ADM_DIVIDER"

echo -n "Enter option: "
read arg

echo "$ADM_DIVIDER"4

if [ $arg == "1" ]; then
    echo "ps"
    echo "kill"
fi

if [ $arg == "2" ]; then
    ps -s
fi

if [ $arg == "3" ]; then
    ps -l
fi

echo "$ADM_DIVIDER"
