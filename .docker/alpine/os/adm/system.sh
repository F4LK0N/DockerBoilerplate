#!/bin/sh

distribution=$( cat /etc/os-release | grep PRETTY_NAME | cut -d\" -f2 )
version=$( cat /etc/debian_version )

clear
echo "$ADM_DIVIDER"
echo "$ADM_LOGO"
echo "$ADM_DIVIDER"
echo "### SYSTEM INFO ###"
echo "$ADM_DIVIDER"

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

echo -n "Enter to continue..."
read -r -s -n 1 option
