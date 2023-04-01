FROM debian:11-slim
WORKDIR /

LABEL "org.opencontainers.image.authors"="F4LK0N"
LABEL "org.opencontainers.image.version"="1.0"

########################################################################################################################
### DEBIAN ###
########################################################################################################################
### TIMEZONE ###
RUN set -eux; \
    echo "tzdata tzdata/Areas select America" | debconf-set-selections; \
    echo "tzdata tzdata/Zones/America select Sao_Paulo" | debconf-set-selections; \
    rm -f /etc/localtime /etc/timezone; \
    dpkg-reconfigure -f noninteractive tzdata

### PACKAGES ###
RUN set -eux; \
    apt-get update; \
    apt-get install -y --no-install-recommends \
        procps \
        iftop \
        psmisc \
    ; \
    apt-get purge -y --auto-remove -o APT::AutoRemove::RecommendsImportant=false; \
    apt-get autoremove --purge; \
    apt-get clean; \
    apt-get autoclean; \
    rm -rf \
        /tmp/* \
        /var/tmp/* \
        /var/lib/apt/lists/* \
    ;

### FILESYSTEM ###
# Centralize Folders
RUN set -eux; \
    mkdir -p /adm/; \
    mkdir -p /docker/; \
    mkdir -p /data/; \
    mkdir -p /logs/; \
    mkdir -p /logs/os/; \
    ln -s /var/log/ /logs/os/;
# Import Content
COPY ./os/root/.bashrc /root/.bashrc
COPY ./os/adm/ /adm/
COPY ./os/docker/ /docker/

########################################################################################################################
### CONTAINER ###
########################################################################################################################
STOPSIGNAL SIGWINCH
ENTRYPOINT ["/docker/entrypoint.sh"]
CMD ["RUN"]
