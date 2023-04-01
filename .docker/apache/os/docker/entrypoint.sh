#!/bin/bash
set -e

echo "### CONTAINER START ###"
/docker/start.sh

echo "### CONTAINER RUN ###"
exec /docker/run.sh
