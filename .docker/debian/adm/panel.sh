#!/bin/bash

arg="1000"

while [ $arg != "0" ]
do
    
    echo "$ADM_LOGO"
    echo "$ADM_DIVIDER"
    echo " 1 = System Info"
    echo " 2 = Users"
    echo " 3 = Groups"
    echo " 0 = EXIT"
    echo "$ADM_DIVIDER"

    echo -n "Enter option: "
    read arg
    clear

    if [ $arg == "1" ]; then
        ./system.sh
    fi

    if [ $arg == "2" ]; then
        ./users.sh
    fi

    if [ $arg == "3" ]; then
        ./groups.sh
    fi

    if [ $arg != "0" ]; then
        echo -n "Enter to continue..."
        read arg2
        clear
    fi

done
