#!/bin/bash

full=$( cat /etc/passwd )
short=$( cat /etc/passwd | cut -d\: -f1 )

echo "$ADM_LOGO"
echo "$ADM_DIVIDER"
echo "### PROCESSES ###"
echo "$ADM_DIVIDER"
echo " 1 = Commands"
echo " 2 = List"
echo " 3 = Tree (pstree)"
echo "$ADM_DIVIDER"

echo -n "Enter option: "
read arg

echo "$ADM_DIVIDER"4

if [ $arg == "1" ]; then
    echo "ps -A"
    echo "pstree -au"
    echo "kill"
fi

if [ $arg == "2" ]; then
    ps -A
fi

if [ $arg == "3" ]; then
    pstree -au
fi

echo "$ADM_DIVIDER"
