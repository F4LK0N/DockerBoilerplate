FROM mysql:8-debian
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

### SQL ###
ENV SQL_DATA="${ROOT_DATA}/sql"
ENV SQL_LOGS="${ROOT_LOGS}/sql"
#ENV MYSQL_ROOT_PASSWORD=root
#ENV MYSQL_DATABASE=app
#ENV MYSQL_USER=user
#ENV MYSQL_PASSWORD=pass
#ENV MYSQL_INITDB_SKIP_TZINFO=true

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



