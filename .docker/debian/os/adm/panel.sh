#!/bin/bash

option="---"
while [ "$option" != "" ] && [ "$option" != "0" ]
do
    
    clear
    echo "$ADM_DIVIDER"
    echo "$ADM_LOGO"
    echo "$ADM_DIVIDER"
    echo " 0 = [EXIT]"
    echo " 1 = System Info"
    echo " 2 = Users"
    echo " 3 = Groups"
    echo " 4 = Processes"
    echo " 5 = Services"
    echo " 6 = Network"
    echo " 7 = Memory"
    echo " 8 = Storage"
    echo "$ADM_DIVIDER"

    echo -n "Enter option: "
    read option

    if [ "$option" == "1" ]; then /adm/system.sh; fi
    if [ "$option" == "2" ]; then /adm/users.sh; fi
    if [ "$option" == "3" ]; then /adm/groups.sh; fi
    if [ "$option" == "4" ]; then /adm/processes.sh; fi
    if [ "$option" == "5" ]; then /adm/services.sh; fi
    if [ "$option" == "6" ]; then /adm/network.sh; fi
    if [ "$option" == "7" ]; then /adm/memory.sh; fi
    if [ "$option" == "8" ]; then /adm/storage.sh; fi

done

echo "EXIT"
clear
