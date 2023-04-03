#!/bin/bash

distribution=$( cat /etc/os-release | grep PRETTY_NAME | cut -d\" -f2 )
version=$( cat /etc/debian_version )

clear
echo "$ADM_DIVIDER"
echo "$ADM_LOGO"
echo "$ADM_DIVIDER"
echo "### SYSTEM INFO ###"
echo "$ADM_DIVIDER"
echo "Distribution: $distribution"
echo "Version     : $version"
echo "$ADM_DIVIDER"

echo -n "Enter to continue..."
read -r -n 1 option
