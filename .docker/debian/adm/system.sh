#!/bin/bash
distribution=$( cat /etc/os-release | grep PRETTY_NAME | cut -d\" -f2 )
version=$( cat /etc/debian_version )

echo "Distribution: $distribution"
echo "Version     : $version"
