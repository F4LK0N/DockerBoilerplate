FROM httpd:2.4
WORKDIR /

LABEL "org.opencontainers.image.authors"="F4LK0N"
LABEL "org.opencontainers.image.version"="1.0"

########################################################################################################################
### DEBIAN ###
########################################################################################################################
#######################
# Logs #
#######################
# /var/log/
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
        net-tools \
        iftop \
    ; \
    apt-get purge -y --auto-remove -o APT::AutoRemove::RecommendsImportant=false; \
    apt-get autoremove --purge; \
    apt-get clean; \
    apt-get autoclean; \
    rm -rf \
        /tmp/* \
        /var/tmp/* \
        /var/lib/apt/lists/* \
        /usr/share/doc/* \
    ;

### FILESYSTEM ###
# Centralize Folders
RUN set -eux; \
    mkdir -p /app/; \
    mkdir -p /app/public/; \
    mkdir -p /adm/; \
    mkdir -p /docker/; \
    mkdir -p /data/; \
    mkdir -p /logs/; \
    mkdir -p /logs/os/; \
    mkdir -p /logs/apache/; \
    ln -s /var/log/ /logs/os/;
# Import Content
COPY ./os/root/.bashrc /root/.bashrc
COPY ./os/adm/ /adm/
COPY ./os/docker/ /docker/

########################################################################################################################
### APACHE ###
########################################################################################################################
# Config #
#######################
# /usr/local/apache2/conf/
#   httpd.conf
#######################
# Log #
#######################
# /usr/local/apache2/log/
#   access.log
#   error.log
########################################################################################################################
COPY apache/httpd.conf /usr/local/apache2/conf/httpd.conf

#########################################################################################################################
#### CONTAINER ###
#########################################################################################################################
STOPSIGNAL SIGWINCH
ENTRYPOINT ["/docker/entrypoint.sh"]
CMD ["RUN"]
