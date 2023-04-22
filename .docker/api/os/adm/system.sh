#!/bin/sh

clear
echo "$ADM_DIVIDER"
echo "$ADM_LOGO"
echo "$ADM_DIVIDER"
echo "### SYSTEM INFO ###"
echo "$ADM_DIVIDER"


distribution=$( cat /etc/os-release | grep "^NAME" | cut -d\" -f2 | cut -d' ' -f1 )
version=$( cat /etc/os-release | grep VERSION_ID | cut -d\= -f2 )
echo "OS Distribution  : $distribution"
echo "OS Version       : $version"
echo "$ADM_DIVIDER"


if [ -x "$(command -v httpd)" ]; then
    apache_version=$( httpd -v | grep "^Server version:" | awk -F 'Apache/' '{print $2}' | cut -d' ' -f1 )
    apache_built=`echo $( httpd -v | grep "^Server built:" | awk -F 'built: ' '{print $2}' )`
    
    echo "Apache Version   : $apache_version"
    echo "Apache Built     : $apache_built"
    echo "$ADM_DIVIDER"
fi


if [ -x "$(command -v php)" ]; then
    php_version=$( php -v | grep "^PHP" | cut -d' ' -f2 | sed 's/ *$//g' )
    php_connection=$( php -v | grep "^PHP" | cut -d'(' -f2 | awk -F ')' '{print $1}' )
    php_threads_mode=$( php -v | grep "^PHP" | cut -d'(' -f4 | awk -F ')' '{print $1}' )
    php_built=$( php -v | grep "(built:" | awk -F 'built: ' '{print $2}' | awk -F ')' '{print $1}' )
    
    echo "PHP Version      : $php_version"
    echo "PHP Connection   : $php_connection"
    echo "PHP Thread Mode  : $php_threads_mode"
    echo "PHP Built        : $php_built"
    echo "$ADM_DIVIDER"
fi


echo -n "Enter to continue..."
read -r -s -n 1 option
