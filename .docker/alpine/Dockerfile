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
ARG ARG_OS_VERSION
ARG ARG_OS_APK_MIRROR

### CONTAINER ###
ENV HOST="${ARG_HOST}"
ENV DOMAIN="${ARG_DOMAIN}"
ENV TIMEZONE="${ARG_TIMEZONE}"
ENV ROOT_DATA="/data"
ENV ROOT_LOGS="/logs"

### OS ###
ENV ENV="/root/.ashrc"
ENV OS_VERSION="${ARG_OS_VERSION}"
ENV OS_APK_MIRROR="${ARG_OS_APK_MIRROR}/v${ARG_OS_VERSION}"
ENV OS_DATA="${ROOT_DATA}/os"
ENV OS_LOGS="${ROOT_LOGS}/os"

### APPLICATION ###
ENV APP_ROOT="/src"

########################################################################################################################
### DATA ###
########################################################################################################################
### IMAGES ###
COPY --chmod=755 --from=fkn-data /data/adm/stable /adm

### PACKAGES ###
RUN set -eux; \
    # Mirrors
    truncate -s 0 /etc/apk/repositories; \
    echo "${OS_APK_MIRROR}/main" >> /etc/apk/repositories; \
    echo "${OS_APK_MIRROR}/community" >> /etc/apk/repositories; \
    # Update
    apk update; \
    apk add --no-cache \
        \
        # OS - Core
        openrc \
        iftop; \
    # Clean
    rm -r -f /var/cache/apk/*; \
    rm -r -f /var/lib/apk/*; \
    rm -r -f /etc/apk/cache/*;

### DOWNLOADS ###
RUN set -eux; \
    # Dependencies
    apk update; \
    apk add --virtual temp_dependencies \
        tzdata \
    ;\
    # OS - Timezone
        cp "/usr/share/zoneinfo/${TIMEZONE}" /etc/localtime; \
        echo "${TIMEZONE}" > /etc/timezone; \
    # Clean
    apk del temp_dependencies; \
    rm -r -f /var/cache/apk/*; \
    rm -r -f /var/lib/apk/*; \
    rm -r -f /etc/apk/cache/*;

### FILESYSTEM ###
RUN set -eux; \
    mkdir --mode=777 --parents \
        # Container
        /adm \
        ${ROOT_DATA} \
        ${ROOT_LOGS} \
        # OS
        ${OS_DATA} \
        ${OS_LOGS} \
        # Application
        ${APP_ROOT} \
    ;

########################################################################################################################
### CONFIG ###
########################################################################################################################
### IMPORT ###
# OS
COPY --chmod=755 "./os/root/.ashrc" "/root/.ashrc"
COPY --chmod=755 "./os/usr/local/bin/" "/usr/local/bin/"

########################################################################################################################
### CONTAINER ###
########################################################################################################################
STOPSIGNAL SIGWINCH
ENTRYPOINT ["container-entrypoint"]
CMD ["RUN"]
