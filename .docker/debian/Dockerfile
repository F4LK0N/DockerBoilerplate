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
#    savedAptMark="$(apt-mark showmanual)"; \
    apt-get update; \
    apt-get install -y --no-install-recommends \
        procps \
        iftop \
    ; \
    apt-get autoremove; \
    apt-get clean; \
    apt-get autoclean; \
    rm -rf \
        /tmp/* \
        /var/tmp/* \
        /var/lib/apt/lists/* \
    ;
    #apt-mark auto '.*' > /dev/null; \
	#apt-mark manual $savedAptMark > /dev/null; \
	#apt-get purge -y --auto-remove -o APT::AutoRemove::RecommendsImportant=false

### FILESYSTEM ###
# Centralize Folders
RUN set -eux; \
    mkdir -p /adm/; \
    mkdir -p /docker/; \
    mkdir -p /data/; \
    mkdir -p /logs/; \
    mkdir -p /logs/debian/;
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
