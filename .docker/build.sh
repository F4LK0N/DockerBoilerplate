#!/bin/bash

dockerHubRepository="f4lk0n/fkn"

echo_hr ()
{
    local segments=20;
    local segment='###';
    local divider=' ';
    if [[ $1 != '' ]]; then
        segments="$1";
    fi
    if [[ $2 != '' ]]; then
        segment="$2";
    fi
    if [[ $3 != '' ]]; then
        divider="$3";
    fi
    while [[ $segments > 1 ]]
    do
        echo -n "$segment";
        echo -n "$divider";
        ((segments--));
    done
    echo "$segment";
}

echo_h1 ()
{
    echo_hr 20 '###';
    if [[ $1 == '' ]]; then
        return;
    fi
    echo "### $1 ###";
    echo_hr 20 '###';
}

echo_h2 ()
{
    echo_hr 20 '---';
    if [[ $1 == '' ]]; then
        return;
    fi
    echo "--- $1 ---";
    echo_hr 20 '---';
}

play_sounds ()
{
    local sounds=1;
    local interval=1;
    if [[ $1 != '' ]]; then
        sounds="$1";
    fi
    if [[ $2 != '' ]]; then
        interval="$2";
    fi

    while [[ $sounds > 0 ]]
    do
        printf '\a';
        sleep $interval;
        ((sounds--));
    done
}

echo_timer ()
{
    local seconds=5;
    local showDots=1;
    if [[ $1 != '' ]]; then
        seconds="$1";
    fi
    if [[ $2 != '' ]]; then
        showDots="$2";
    fi
    ((seconds=seconds*6));

    while [[ $seconds > 0 ]]
    do
        if [[ "$showDots" == "1" ]]; then
            echo -n ".";
            if [[ "$(($(($seconds-1))%60))" == "0" ]]; then
                echo '';
            fi
        fi

        read -r -s -n 1 -t 0.166 option
        if [[ "$option" != '' ]]; then
            if [[ "$option" == 'w' ]]; then
                echo '';
                echo "Waiting... (Press any key to continue)";
                read -r -s -n 1 option;
            fi
            break;
        fi

        ((seconds--));
    done
}

echo_success ()
{
    echo_h1;
    echo '!!! SUCCESS !!!';
    echo_h1;

    play_sounds 2 0.25;
    sleep 0.5;
    play_sounds 1;

    echo 'Exiting in 30 seconds. (Press 'W' to wait)';
    echo_timer 30;
}

echo_error ()
{
    echo_h1;
    echo '!!! ERROR !!!';
    echo_h1;

    if [[ $1 != '' ]]; then
        echo "$1";
        echo_h1;
    fi

    play_sounds 3 0.2;
    sleep 0.35;
    play_sounds 3 0.2;
    sleep 0.35;
    play_sounds 3 0.2;

    echo '(Press 'ENTER' to exit)';
    read -s option;
}

docker_build ()
{
    echo_h1 "BUILD";

    if [[ $1 == '' ]]; then
        echo_error '"dirPath": mandatory!';
        exit 1;
    fi
    if [[ $2 == '' ]]; then
        echo_error '"tag": mandatory!';
        exit 1;
    fi

    dockerfileDir="$(dirname ${0})\\${1}\\";
    imageTag="${dockerHubRepository}:${2}";
    echo_h2
    echo "Dockerfile: ${dockerfileDir}\\Dockerfile";
    echo "Image Tag : ${imageTag}";
    echo_h2

    docker build --tag "${imageTag}" "${dockerfileDir}"

    if [[ "$?" != '0' ]]; then
        echo_error;
        exit $?;
    fi
}

docker_push ()
{
    echo_h1 "PUSH";

    if [[ $1 == '' ]]; then
        echo_error '"tag": mandatory!';
        exit 1;
    fi

    imageTag="${dockerHubRepository}:${1}";
    echo_h2
    echo "Image Tag : ${imageTag}";
    echo_h2

    docker push "$imageTag"

    if [[ "$?" != '0' ]]; then
        echo_error;
        exit $?;
    fi
}

docker_build data data;
docker_push data;

echo_success;
