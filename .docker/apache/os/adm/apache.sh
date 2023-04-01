#!/bin/bash

echo "$ADM_LOGO"
echo "$ADM_DIVIDER"
echo "### APACHE ###"
echo "$ADM_DIVIDER"
echo " 1 = Commands"
echo " 2 = Restart"
echo " 3 = Check Config Syntax"
echo "$ADM_DIVIDER"

echo -n "Enter option: "
read arg

echo "$ADM_DIVIDER"4

if [ $arg == "1" ]; then
    echo "httpd -v"
    echo "apachectl -k restart"
    echo "apachectl -t"
fi

if [ $arg == "2" ]; then
    apachectl -k restart
fi

if [ $arg == "3" ]; then
    apachectl -t
fi

echo "$ADM_DIVIDER"
