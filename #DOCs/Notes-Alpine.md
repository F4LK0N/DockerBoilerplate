# Shell Config

https://stackoverflow.com/questions/38024160/how-to-get-etc-profile-to-run-automatically-in-alpine-docker

Dockerfile:
```
ENV ENV="/root/.ashrc"
```

# File System Permissions
r = 100b = 4
w = 010b = 2
x = 001b = 1


# XDebug
https://xdebug.org/docs/all_settings

```
127.0.0.1/?XDEBUG_TRIGGER
```


# Timezone
https://wiki.alpinelinux.org/wiki/Setting_the_timezone

apk add --virtual temp_deps \
        tzdata \
cp /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime; \
echo "America/Sao_Paulo" > /etc/timezone; \
apk del temp_deps;


# Swap Memory Disable
https://docs.docker.com/compose/compose-file/05-services/#mem_limit
