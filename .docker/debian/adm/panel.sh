#!/bin/bash

logo="
    ______    ___     __     __ __   ____     _   __           ___     ____     __  ___ 
   / ____/   /   |   / /    / //_/  / __ \   / | / /          /   |   / __ \   /  |/  / 
  / /_      / /| |  / /    / ,<    / / / /  /  |/ /          / /| |  / / / /  / /|_/ /  
 / __/     / ___ | / /___ / /| |  / /_/ /  / /|  /          / ___ | / /_/ /  / /  / /   
/_/       /_/  |_|/_____//_/ |_|  \____/  /_/ |_/          /_/  |_|/_____/  /_/  /_/    
"
echo "$logo"
echo " 1 = System Info"
echo " 2 = Users"

echo -n "Enter option: "
read arg

if [ $arg == "1" ]; then
    clear
    echo "$logo"
    echo "### SYSTEM INFO ###"
    echo ""
    exec ./system.sh
fi

if [ $arg == "2" ]; then
    clear
    echo "$logo"
    echo "### USERS ###"
    echo ""
    exec ./users.sh
fi
