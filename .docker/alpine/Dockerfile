FROM alpine:3.17
LABEL "org.opencontainers.image.authors"="F4LK0N"
LABEL "org.opencontainers.image.version"="1.1"

########################################################################################################################
### SETUP ###
########################################################################################################################
WORKDIR /
ARG ARG_HOST
ARG ARG_DOMAIN
ARG ARG_TIMEZONE
ARG ARG_OS_VERSION="3.17"
ARG ARG_OS_APK_MIRROR

### CONTAINER ###
ENV HOST="${ARG_HOST}"
ENV DOMAIN="${ARG_DOMAIN}"
ENV ROOT_DATA="/data"
ENV ROOT_LOGS="/logs"

### OS ###
ENV ENV="/root/.ashrc"
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
RUN set -eux; \
    # Mirrors
    rm -f /etc/apk/repositories; \
    echo "${ARG_OS_APK_MIRROR}/v${ARG_OS_VERSION}/main" >> /etc/apk/repositories; \
    echo "${ARG_OS_APK_MIRROR}/v${ARG_OS_VERSION}/community" >> /etc/apk/repositories; \
    chmod 644 /etc/apk/repositories; \
    # Update
    apk update; \
    apk upgrade; \
    # Clean
    rm -rf /var/cache/apk/*; \
    rm -rf /var/lib/apk/*; \
    rm -rf /etc/apk/cache/*;

### TIMEZONE ###
RUN set -eux; \
    # Dependencies
    apk update; \
    apk add --virtual temp_dependencies \
        tzdata \
    ; \
    # Config
        cp "/usr/share/zoneinfo/${ARG_TIMEZONE}" /etc/localtime; \
        echo "${ARG_TIMEZONE}" > /etc/timezone; \
    # Clean
    apk del temp_dependencies; \
    rm -rf /var/cache/apk/*; \
    rm -rf /var/lib/apk/*; \
    rm -rf /etc/apk/cache/*;

########################################################################################################################
### INSTALL ###
########################################################################################################################
### PACKAGES ###
RUN set -eux; \
    # Update
    apk update; \
    # Install
    apk add --no-cache \
        \
        # OS - Core
        openrc \
        iftop; \
    # Clean
    rm -r -f /var/cache/apk/*; \
    rm -r -f /var/lib/apk/*; \
    rm -r -f /etc/apk/cache/*;

#### DOWNLOADS ###
#RUN set -eux; \
#    # Dependencies
#    apk update; \
#    apk add --virtual temp_deps \
#        tzdata \
#        7zip; \
#    \
#    # OS - Timezone
#        cp "/usr/share/zoneinfo/${ARG_TIMEZONE}" /etc/localtime; \
#        echo "${ARG_TIMEZONE}" > /etc/timezone; \
#    # PHP - Phalcon
#        # Source
#        mkdir -p /tmp/phalcon/; \
#        cd /tmp/phalcon/; \
#        curl -LO https://github.com/phalcon/cphalcon/releases/download/v${PHALCON_VERSION}/phalcon-php8.1-nts-ubuntu-gcc-x64.zip; \
#        7z x phalcon-php8.1-nts-ubuntu-gcc-x64.zip; \
#        # Install
#        mkdir -p ${PHP_MODULES}; \
#        cp phalcon.so ${PHP_MODULES}; \
#        chmod 755 ${PHP_MODULES}; \
#        chmod 755 ${PHP_MODULES}/phalcon.so; \
#        cd /; \
#    # Clean
#    apk del temp_deps; \
#    rm -r -f /tmp/phalcon/; \
#    rm -r -f /var/cache/apk/*; \
#    rm -r -f /var/lib/apk/*; \
#    rm -r -f /etc/apk/cache/*;

### IMAGES ###
#COPY --chmod=755 --from=fkn-data /data/adm/stable/ /adm/

### IMPORT ###


#### FILESYSTEM ###
#RUN set -eux; \
#    mkdir --mode=777 --parents \
#        # Container
#        /adm \
#        ${ROOT_DATA} \
#        ${ROOT_LOGS} \
#        # OS
#        ${OS_DATA} \
#        ${OS_LOGS} \
#        # Application
#        ${APP_ROOT} \
#    ;

#########################################################################################################################
#### CONFIG ###
#########################################################################################################################
#### IMPORT ###
## OS
#COPY --chmod=755 "./os/root/.ashrc" "/root/.ashrc"
#COPY --chmod=755 "./os/usr/local/bin/" "/usr/local/bin/"

#########################################################################################################################
#### CONTAINER ###
#########################################################################################################################
#STOPSIGNAL SIGWINCH
#ENTRYPOINT ["container-entrypoint"]
#CMD ["RUN"]
