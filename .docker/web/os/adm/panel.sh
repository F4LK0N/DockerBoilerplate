#!/bin/sh

option="---"
while [ "$option" != "" ] && [ "$option" != "0" ]
do
    
    clear
    echo "$ADM_DIVIDER"
    echo "$ADM_LOGO"
    echo "$ADM_DIVIDER"
    echo " 0 = [EXIT]"
    echo " 1 = System Info"
    echo " 2 = Users and Groups"
    echo " 3 = Processes"
    echo " 4 = Services"
    echo " 5 = Network"
    echo " 6 = Memory"
    echo " 7 = Storage"
    echo "$ADM_DIVIDER"

    echo -n "Enter option: "
    read -r -s -n 1 option

    if [ "$option" == "1" ]; then /adm/system.sh; fi
    if [ "$option" == "2" ]; then /adm/users_groups.sh; fi
    if [ "$option" == "3" ]; then /adm/processes.sh; fi
    if [ "$option" == "4" ]; then /adm/services.sh; fi
    if [ "$option" == "5" ]; then /adm/network.sh; fi
    if [ "$option" == "6" ]; then /adm/memory.sh; fi
    if [ "$option" == "7" ]; then /adm/storage.sh; fi

done

echo "EXIT"
clear
