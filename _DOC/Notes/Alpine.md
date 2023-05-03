# READ ABOUT CONFIG
https://docs.oracle.com/cd/E19120-01/open.solaris/819-2379/userconcept-26/index.html



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
https://docs.docker.com/compose/compose-file/deploy/#memory
```
services:
  container_name:
    deploy:
      resources:
        limits:
          memory: 256M
    memswap_limit: 256M
```

# WSL Volume Mapping
https://stackoverflow.com/questions/61083772/where-are-docker-volumes-located-when-running-wsl-using-docker-desktop#answer-61147954