#!/bin/bash

DockerHubRepo="f4lk0n/fkn"
DockerfileDir="php"
ImageTag="php8.1"

echo "--- --- --- --- --- --- --- --- ---"
echo "### DOCKER - IMAGE BUILD ###"
echo "--- --- --- --- --- --- --- --- ---"

echo "Dockerfile:"
DockerfilePath=$(dirname "$0")
DockerfilePath="$DockerfilePath\\$DockerfileDir\\"
echo "$DockerfilePath\\Dockerfile"
echo "--- --- --- --- --- --- --- --- ---"

echo "Build Started..."
docker build --tag "$DockerHubRepo:$ImageTag" "$DockerfilePath"
echo "Build Finished!"
echo "--- --- --- --- --- --- --- --- ---"

echo "Push Started..."
docker push "$DockerHubRepo:$ImageTag"
echo "Push Finished!"
echo "--- --- --- --- --- --- --- --- ---"

echo -n "Exiting"
timeout=50
while [[ "$timeout" != "0" ]]
do
    echo -n "."
    timeout=$((timeout-1))

    read -r -s -n 1 -t 0.1 option
    if [[ "$option" != '' ]]; then
        break;
    fi

done
