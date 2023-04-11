#!/bin/sh

clear
echo "$ADM_DIVIDER"
echo "$ADM_LOGO"
echo "$ADM_DIVIDER"
echo "### SYSTEM INFO ###"
echo "$ADM_DIVIDER"


distribution=$( cat /etc/os-release | grep "^NAME" | cut -d\" -f2 )
version=$( cat /etc/os-release | grep VERSION_ID | cut -d\= -f2 )

echo "OS Distribution : $distribution"
echo "OS Version      : $version"
echo "$ADM_DIVIDER"


if [ -x "$(command -v httpd)" ]; then
    httpd_version=$( httpd -v | grep version | cut -d\: -f2 | sed 's/ *$//g' )
    httpd_version=`echo $httpd_version | sed 's/ *$//g'`

    httpd_built=$( httpd -v | grep built | cut -d\: -f2 | sed 's/ *$//g' )
    httpd_built=`echo $httpd_built | sed 's/ *$//g'`
  
    echo "HTTPD Version   : $httpd_version"
    echo "HTTPD Built     : $httpd_built"
    echo "$ADM_DIVIDER"
fi


if [ -x "$(command -v php)" ]; then
    php_version=$( php -v | grep "^PHP" | cut -d' ' -f2 | sed 's/ *$//g' )
    php_version=`echo $php_version | sed 's/ *$//g'`

    php_built=$( php -v | grep built | cut -d"built:" -f2 | sed 's/ *$//g' )
    php_built=$( php -v | grep built | awk -F 'built: ' '{print $2}' | awk -F ')' '{print $1}' )
    #php_built=`echo $php_built | sed 's/ *$//g'`
  
    echo "PHP Version   : $php_version"
    echo "PHP Built     : $php_built"
    echo "$ADM_DIVIDER"
fi


echo -n "Enter to continue..."
read -r -s -n 1 option
