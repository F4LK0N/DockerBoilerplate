#!/bin/bash
set -e

trap "echo '### CONTAINER STOP ###'; exit" SIGWINCH

while true; do
    sleep 1
done
