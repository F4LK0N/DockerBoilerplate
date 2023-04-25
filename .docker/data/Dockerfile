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
ARG ARG_OS_VERSION='3.17'
ARG ARG_OS_APK_MIRROR

### CONTAINER ###
ENV HOST="${ARG_HOST}"
ENV DOMAIN="${ARG_DOMAIN}"
ENV ROOT_DATA="/data"

### OS ###
ENV ENV="/root/.ashrc"

### FILESYSTEM ###
RUN set -eux; \
    mkdir --mode=777 --parents \
        # Container
        ${ROOT_DATA} \
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
        openrc \
        iftop \
    ; \
    # Clean
    rm -rf /var/cache/apk/*; \
    rm -rf /var/lib/apk/*; \
    rm -rf /etc/apk/cache/*;

### IMPORT ###
# Shell
COPY --chmod=755 "./root/.ashrc" "/root/.ashrc"
# Adm
COPY --chmod=755 "./adm/*" "/usr/local/bin/"
RUN set -eux; /usr/local/bin/adm-setup;
# Entrypoint
COPY --chmod=755 "./usr/local/bin/*" "/usr/local/bin/"

########################################################################################################################
### DATA ###
########################################################################################################################
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
COPY --chmod=755 "./root/*" "/data/shell/"
# Adm
COPY --chmod=755 "./adm/*" "/data/adm/"




########################################################################################################################
### SOURCE ###
########################################################################################################################
### ADM ###
RUN set -eux; \
    mkdir --mode=777 --parents ${ROOT_DATA}/adm/1.0/; \
    ln -s "${ROOT_DATA}/adm/1.0/" "${ROOT_DATA}/adm/latest"; \
    ln -s "${ROOT_DATA}/adm/1.0/" "${ROOT_DATA}/adm/stable";
COPY --chmod=755 "./os/adm/*" "${ROOT_DATA}/adm/1.0/"

### COMPOSER ###
RUN set -eux; \
    mkdir --mode=777 --parents ${ROOT_DATA}/composer/latest/;
COPY --from=composer:latest /usr/bin/composer ${ROOT_DATA}/composer/latest/

########################################################################################################################
### CONTAINER ###
########################################################################################################################
STOPSIGNAL SIGWINCH
ENTRYPOINT ["container-entrypoint"]
CMD ["RUN"]
