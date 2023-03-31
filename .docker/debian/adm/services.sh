#!/bin/bash

full=$( cat /etc/passwd )
short=$( cat /etc/passwd | cut -d\: -f1 )

echo "$ADM_LOGO"
echo "$ADM_DIVIDER"
echo "### SERVICES ###"
echo "$ADM_DIVIDER"
echo " 1 = Commands"
echo " 2 = List"
echo " 3 = Files"
echo "$ADM_DIVIDER"

echo -n "Enter option: "
read arg

echo "$ADM_DIVIDER"4

if [ $arg == "1" ]; then
    echo "services"
    echo "ls /etc/init.d/*"
fi

if [ $arg == "2" ]; then
    service --status-all
fi

if [ $arg == "3" ]; then
    ls --color=auto --group-directories-first -lAs /etc/init.d/*
fi

echo "$ADM_DIVIDER"
