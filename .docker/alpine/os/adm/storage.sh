#!/bin/sh

option="---"
while [ "$option" != "" ] && [ "$option" != "0" ]
do

    clear
    echo "$ADM_DIVIDER"
    echo "$ADM_LOGO"
    echo "$ADM_DIVIDER"
    echo "### STORAGE ###"
    echo "$ADM_DIVIDER"
    
    if [ "$option" == "---" ]; then

        echo " 0 = [BACK]"
        echo " 1 = Commands"
        echo " 2 = Storage Stats"
        echo " 3 = Directories Tree"
        echo " 4 = FileSystem Tree"
        echo "$ADM_DIVIDER"

        echo -n "Enter option: "
        read -r -s -n 1 option

    else

        if [ "$option" == "1" ]; then
            echo "- df"
            echo "- df --block-size=GB"
            echo "- du"
            echo "- du -P --block-size=MB --exclude='sys' --exclude='proc' --exclude='lib' --exclude='usr/lib' /"
            echo "- du -a -P --block-size=MB --exclude='sys' --exclude='proc' --exclude='lib' --exclude='usr/lib' /"
        fi

        if [ "$option" == "2" ]; then
            df --block-size=GB
        fi

        if [ "$option" == "3" ]; then
            du -P --block-size=MB --exclude='sys' --exclude='proc' --exclude='lib' --exclude='usr/lib' /
        fi

        if [ "$option" == "4" ]; then
            du -a -P --block-size=MB --exclude='sys' --exclude='proc' --exclude='lib' --exclude='usr/lib' /
        fi

        echo "$ADM_DIVIDER"
        echo -n "Enter to continue..."
        read -r -s -n 1 option
        option="---"

    fi

done
