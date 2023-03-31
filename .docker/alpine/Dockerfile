FROM alpine:3.17
WORKDIR /

LABEL "org.opencontainers.image.authors"="F4LK0N"
LABEL "org.opencontainers.image.version"="1.0"

#########################################################################################################################
#### DEBIAN ###
#########################################################################################################################
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

#### BASH ###
#COPY ./root/.bashrc /root/.bashrc

#### FILESYSTEM ###
#RUN set -eux; \
#    mkdir -p /data/; \
#    mkdir -p /logs/; \
#    mkdir -p /logs/debian/; \
#    mkdir -p /adm/; \
#    mkdir -p /docker/

#### LOGS ###
#RUN set -eux; \
#    ln -s /logs/debian/ /var/log/

##### ADM ###
#COPY ./adm/ /adm/

#### DOCKER ###
#STOPSIGNAL SIGWINCH
#COPY ./docker/ /docker/
#ENTRYPOINT ["/docker/entrypoint.sh"]
#CMD ["RUN"]
