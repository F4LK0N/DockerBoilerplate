#!/bin/bash

os_distribution=$( cat /etc/os-release | grep PRETTY_NAME | cut -d\" -f2 )
os_version=$( cat /etc/debian_version )

srv_version=$( httpd -v | grep version | cut -d\: -f2 | sed 's/ *$//g' )
srv_version=`echo $srv_version | sed 's/ *$//g'`

srv_built=$( httpd -v | grep built | cut -d\: -f2 | sed 's/ *$//g' )
srv_built=`echo $srv_built | sed 's/ *$//g'`

echo "$ADM_LOGO"
echo "$ADM_DIVIDER"
echo "### SYSTEM INFO ###"
echo "$ADM_DIVIDER"
echo "OPERATIONAL SYSTEM"
echo "Distribution : $os_distribution"
echo "Version      : $os_version"
echo "$ADM_DIVIDER"
echo "SERVER"
echo "Version      : $srv_version"
echo "Built        : $srv_built"
echo "$ADM_DIVIDER"
