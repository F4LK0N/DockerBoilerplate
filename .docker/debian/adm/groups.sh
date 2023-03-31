#!/bin/bash

full=$( cat /etc/group )
short=$( cat /etc/group | cut -d\: -f1 )

echo "$full"
echo ""
echo "$short"
