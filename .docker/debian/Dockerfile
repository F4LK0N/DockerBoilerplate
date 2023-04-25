FROM debian:11.6-slim
LABEL "org.opencontainers.image.authors"="F4LK0N"
LABEL "org.opencontainers.image.version"="1.1"

########################################################################################################################
### SETUP ###
########################################################################################################################
WORKDIR /
ARG ARG_DOMAIN
ARG ARG_TIMEZONE

### CONTAINER ###
ENV DOMAIN="${ARG_DOMAIN}"
ENV ROOT_DATA="/data"
ENV ROOT_LOGS="/logs"

### OS ###
ENV TERM="xterm"
ENV OS_DATA="${ROOT_DATA}/os"
ENV OS_LOGS="${ROOT_LOGS}/os"

### APPLICATION ###
ENV APP_ROOT="/src"

### FILESYSTEM ###
RUN set -eux; \
    mkdir --mode=777 --parents \
        # Container
        ${ROOT_DATA} \
        ${ROOT_LOGS} \
        # OS
        ${OS_DATA} \
        ${OS_LOGS} \
        # Application
        ${APP_ROOT} \
    ;


### PACKAGES ###
# Mirrors
COPY --chmod=644 "./etc/apt/sources.list" "/etc/apt/sources.list"
RUN set -eux; \
    # Update
    apt-get update; \
    apt-get upgrade -y; \
    # Clean
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

### TIMEZONE ###
RUN set -eux; \
    echo "tzdata tzdata/Areas select America" | debconf-set-selections; \
    echo "tzdata tzdata/Zones/America select Sao_Paulo" | debconf-set-selections; \
    rm -f /etc/localtime /etc/timezone; \
    dpkg-reconfigure -f noninteractive tzdata;

########################################################################################################################
### INSTALL ###
########################################################################################################################
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

### SOURCES ###
#RUN set -eux; \
#    # Dependencies
#    apk update; \
#    apk add --virtual temp_sources_dependencies \
#        7zip \
#    ; \
#    # Program Example
#        # Download
#        mkdir -p /tmp/program-example/; \
#        cd /tmp/program-example/; \
#        curl -LO https://site.com/program-example.zip; \
#        7z x program-example.zip; \
#        # Install
#        mkdir -p /opt/program-example/; \
#        cp program-x.so /opt/program-example/; \
#        chmod 755 /opt/program-example/; \
#        chmod 755 /opt/program-example/program-example.so; \
#        # Clear
#        rm -rf /tmp/program-example/; \
#        cd /; \
#    # Clean
#    apk del temp_sources_dependencies; \
#    rm -rf /var/cache/apk/*; \
#    rm -rf /var/lib/apk/*; \
#    rm -rf /etc/apk/cache/*;

### IMPORT ###
# Shell
COPY --chmod=755 --from=f4lk0n/fkn:data "/data/shell/latest/.bashrc" "/root/.bashrc"
# Adm
COPY --chmod=755 --from=f4lk0n/fkn:data "/data/adm/latest/bash/*" "/usr/local/bin/"
# Entrypoint
COPY --chmod=755 "./usr/local/bin/*" "/usr/local/bin/"

########################################################################################################################
### CONTAINER ###
########################################################################################################################
STOPSIGNAL SIGWINCH
ENTRYPOINT ["container-entrypoint"]
CMD ["RUN"]
