#!/bin/bash

full=$( cat /etc/passwd )
short=$( cat /etc/passwd | cut -d\: -f1 )

echo "$ADM_LOGO"
echo "$ADM_DIVIDER"
echo "### STORAGE ###"
echo "$ADM_DIVIDER"
echo " 1 = Commands"
echo " 2 = List"
echo "$ADM_DIVIDER"

echo -n "Enter option: "
read arg

echo "$ADM_DIVIDER"4

if [ $arg == "1" ]; then
    echo "df"
    echo "du"
fi

if [ $arg == "2" ]; then
    df
fi

echo "$ADM_DIVIDER"
