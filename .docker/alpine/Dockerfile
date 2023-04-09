FROM alpine:3.17
WORKDIR /

LABEL "org.opencontainers.image.authors"="F4LK0N"
LABEL "org.opencontainers.image.version"="1.0"

########################################################################################################################
### ALPINE ###
########################################################################################################################
### SHELL ###
ENV ENV="/root/.ashrc"

#### FRONTEND ###
#ARG DEBIAN_FRONTEND noninteractive

#### TIMEZONE ###
#RUN set -eux; \
#    echo "tzdata tzdata/Areas select America" | debconf-set-selections; \
#    echo "tzdata tzdata/Zones/America select Sao_Paulo" | debconf-set-selections; \
#    rm -f /etc/localtime /etc/timezone; \
#    dpkg-reconfigure -f noninteractive tzdata

##### APT-GET ###
#RUN set -eux; \
## Update and Upgrade
#    apt-get update -y; \
#    apt-get upgrade -y; \
## Install
#    apt-get install -y procps iftop; \
## Update and Upgrade
#    apt-get update -y; \
#    apt-get upgrade -y; \
## Clean
#    apt-get autoremove; \
#    apt-get clean; \
#    rm -rf /tmp/*; \
#    rm -rf /var/tmp/*; \
#    rm -rf /var/lib/apt/lists/*

RUN set -eux; \
    apk add --no-cache \
        openrc;

### FILESYSTEM ###
# Centralize Folders
RUN set -eux; \
    # Docker
    mkdir -p /docker/; \
    # Adm
    mkdir -p /adm/; \
    # Data
    mkdir -p /data/; \
    # Logs
    mkdir -p /logs/; \
    mkdir -p /logs/alpine/; \
    ln -s /var/log/ /logs/alpine/;
# Import Content
COPY ./os/root/.ashrc /root/.ashrc
COPY ./os/docker/ /docker/
COPY ./os/adm/ /adm/

## DOCKER ###
STOPSIGNAL SIGWINCH
ENTRYPOINT ["/docker/entrypoint.sh"]
CMD ["RUN"]
