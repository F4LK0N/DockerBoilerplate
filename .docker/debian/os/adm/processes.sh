#!/bin/bash

option="---"
while [ "$option" != "" ] && [ "$option" != "0" ]
do

    clear
    echo "$ADM_DIVIDER"
    echo "$ADM_LOGO"
    echo "$ADM_DIVIDER"
    echo "### PROCESSES ###"
    echo "$ADM_DIVIDER"
    
    if [ "$option" == "---" ]; then

        echo " 0 = [BACK]"
        echo " 1 = Commands"
        echo " 2 = Processes"
        echo " 3 = Processes - Detailed"
        echo "$ADM_DIVIDER"

        echo -n "Enter option: "
        read option

    else

        if [ "$option" == "1" ]; then
            echo "- ps -A"
            echo "- ps -AHFl"
            echo "- kill"
        fi

        if [ "$option" == "2" ]; then
            list=$( ps -A )
            echo "$list"
        fi

        if [ "$option" == "3" ]; then
            list=$( ps -AHFl )
            echo "$list"
        fi

        echo "$ADM_DIVIDER"
        echo -n "Enter to continue..."
        read option
        option="---"

    fi

done
