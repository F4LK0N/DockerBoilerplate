#!/bin/bash
set -e

trap "echo '### CONTAINER STOP ###'; exit" SIGWINCH

#exec httpd -DFOREGROUND "$@"
exec httpd -DFOREGROUND
