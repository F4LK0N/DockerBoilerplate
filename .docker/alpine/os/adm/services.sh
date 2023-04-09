#!/bin/sh

option="---"
while [ "$option" != "" ] && [ "$option" != "0" ]
do

    clear
    echo "$ADM_DIVIDER"
    echo "$ADM_LOGO"
    echo "$ADM_DIVIDER"
    echo "### SERVICES ###"
    echo "$ADM_DIVIDER"
    
    if [ "$option" == "---" ]; then

        echo " 0 = [BACK]"
        echo " 1 = Commands"
        echo " 2 = Services Files"
        echo " 3 = [REALTIME] Services"
        echo "$ADM_DIVIDER"

        echo -n "Enter option: "
        read -r -s -n 1 option

    else

        if [ "$option" == "1" ]; then
            echo "- ls --color=auto -lAs /etc/init.d/*"
            echo "- top"
        fi

        if [ "$option" == "2" ]; then
            list=$( ls --color=auto -lAs /etc/init.d/* )
            echo "$list"
        fi

        if [ "$option" == "3" ]; then
            top
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
