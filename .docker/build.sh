#!/bin/bash

DockerHubRepo="f4lk0n/fkn"
ImageTag="debian11"

echo "--- --- --- --- --- --- --- --- ---"
echo "### DOCKER - IMAGE BUILD ###"
echo "--- --- --- --- --- --- --- --- ---"

ComposeDir=$(dirname "$0")
ComposeDir=$(dirname "${ComposeDir}")
ComposeFile="${ComposeDir}\\compose.yml"
ComposeEnv="${ComposeDir}\\.env"
echo "Compose dir : ${ComposeDir}"
echo "Compose file: ${ComposeFile}"
echo "Compose env : ${ComposeEnv}"
echo "--- --- --- --- --- --- --- --- ---"


echo "Build Started..."
docker compose --project-directory="${ComposeFilePath}" --env-file="${ComposeEnv}" build
if [[ "$?" != "0" ]]; then
  echo '!!! ERROR BUILDING !!!';
  echo -ne '\007';
  read option;
  exit 1;
fi
echo "Build Finished!"
echo "--- --- --- --- --- --- --- --- ---"


echo "Push Started..."
docker push "$DockerHubRepo:$ImageTag"
if [[ "$?" != "0" ]]; then
  echo '!!! ERROR PUSHING !!!';
  echo -ne '\007';
  read option;
  exit 1;
fi
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
