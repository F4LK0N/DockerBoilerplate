#!/bin/sh

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
        echo " 3 = Processes (Detailed)"
        echo " 4 = [REALTIME] Processes"
        echo " 5 = [REALTIME] Processes (Detailed)"
        echo "$ADM_DIVIDER"

        echo -n "Enter option: "
        read -r -s -n 1 option

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

        if [ "$option" == "4" ]; then
            option=""
            while [ "$option" == "" ]
            do 
                list=$( ps -A )
                clear
                echo "$list"
                read -r -s -n 1 -t 0.25 option
            done
            option="DONTWAIT"
        fi

        if [ "$option" == "5" ]; then
            option=""
            while [ "$option" == "" ]
            do 
                list=$( ps -AHFl )
                clear
                echo "$list"
                read -r -s -n 1 -t 0.25 option
            done
            option="DONTWAIT"
        fi


        if [ "$option" != "DONTWAIT" ]; then
            echo "$ADM_DIVIDER"
            echo -n "Enter to continue..."
            read -r -s -n 1 option
        fi
        option="---"

    fi

done
