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
        # OS
        #bash \
        openrc \
        iftop \
    ; \
    # Clean
    rm -rf /var/cache/apk/*; \
    rm -rf /var/lib/apk/*; \
    rm -rf /etc/apk/cache/*;

#### SOURCES ###
#RUN set -eux; \
#    # Dependencies
#    apk update; \
#    apk add --virtual temp_sources_dependencies \
#        7zip \
#    ; \
#    ## Program X
#    #    # Download
#    #    mkdir -p /tmp/program-x/; \
#    #    cd /tmp/program-x/; \
#    #    curl -LO https://site.com/program-x.zip; \
#    #    7z x program-x.zip; \
#    #    # Install
#    #    mkdir -p /opt/program-x/; \
#    #    cp program-x.so /opt/program-x/; \
#    #    chmod 755 /opt/program-x/; \
#    #    chmod 755 /opt/program-x/program-x.so; \
#    #    # Clear
#    #    rm -rf /tmp/program-x/; \
#    #    cd /; \
#    # Clean
#    apk del temp_sources_dependencies; \
#    rm -r -f /var/cache/apk/*; \
#    rm -r -f /var/lib/apk/*; \
#    rm -r -f /etc/apk/cache/*;

### IMAGES ###
# Adm
#COPY --chmod=755 --from=fkn-data /data/adm/stable/ /adm/

### IMPORT ###
# OS
COPY --chmod=755 "./root/*" "/root/"
COPY --chmod=755 "./usr/local/bin/*" "/usr/local/bin/"

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
#### CONTAINER ###
#########################################################################################################################
STOPSIGNAL SIGWINCH
ENTRYPOINT ["container-entrypoint"]
CMD ["RUN"]
