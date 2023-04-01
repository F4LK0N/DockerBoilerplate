#!/bin/bash

distribution=$( cat /etc/os-release | grep PRETTY_NAME | cut -d\" -f2 )
version=$( cat /etc/debian_version )

echo "$ADM_LOGO"
echo "$ADM_DIVIDER"
echo "### SYSTEM INFO ###"
echo "$ADM_DIVIDER"
echo "Distribution: $distribution"
echo "Version     : $version"
echo "$ADM_DIVIDER"
