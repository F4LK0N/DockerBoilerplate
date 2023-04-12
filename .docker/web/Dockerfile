FROM alpine:3.17

LABEL "org.opencontainers.image.authors"="F4LK0N"
LABEL "org.opencontainers.image.version"="1.0"

########################################################################################################################
### SETUP ###
########################################################################################################################
### CONTAINER ###
WORKDIR /

### OS ###
ENV ENV="/root/.ashrc"
ENV OS_VERSION="3.17"
ENV OS_LOGS="/var/log"
ENV OS_DATA="/data/os"

### APACHE ###
ENV HTTPD_VERSION="2.4"
ENV HTTPD_ROOT="/etc/apache2"
ENV HTTPD_CONF="/etc/apache2/httpd.conf"
ENV HTTPD_CONFD="/etc/apache2/conf.d"
ENV HTTPD_MODULES="/usr/lib/apache2"
ENV HTTPD_RUN="/run/apache2"
ENV HTTPD_LOGS="/logs/apache"
ENV HTTPD_DATA="/data/apache"

### PHP ###
ENV PHP_VERSION="8.1"
ENV PHP_ROOT="/etc/php81"
ENV PHP_CONF="/etc/php81/php.ini"
ENV PHP_CONFD="/etc/php81/conf.d"
ENV PHP_MODULES="/usr/lib/php81/modules"
ENV PHP_RUN="/run/php"
ENV PHP_LOGS="/logs/php"
ENV PHP_DATA="/data/php"

### PHALCON ###
ENV PHALCON_VERSION="5.2.1"

########################################################################################################################
### DATA ###
########################################################################################################################
### PACKAGES ###
RUN set -eux; \
    apk update; \
    apk add \
        \
        ### OS ###
        openrc \
        iftop \
        curl \
        \
        ### APACHE ###
        apache2 \
        apache2-ssl \
        \
        ### PHP ###
        php81-apache2 \
        #php81-bcmath \
        #php81-bz2 \
        #php81-calendar \
        php81-common \
        #php81-ctype \
        php81-curl \
        php81-dom \
        #php81-gd \
        #php81-iconv \
        php81-mbstring \
        #php81-mysqli \
        #php81-mysqlnd \
        php81-openssl \
        php81-pdo_mysql \
        #php81-pdo_pgsql \
        #php81-pdo_sqlite \
        php81-phar \
        php81-xml \
        php81-xmlwriter \
        php81-session \
        php81-tokenizer \
        php81-pecl-xdebug; \
    rm -r -f /var/cache/apk/*;

### DOWNLOADS ###
# COMPOSER
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
# PHALCON
RUN set -eux; \
    # Dependencies
    apk update; \
    apk add --virtual phalcon_deps \
        7zip; \
    \
    # Source
    mkdir -p /tmp/phalcon/; \
    cd /tmp/phalcon/; \
    curl -LO https://github.com/phalcon/cphalcon/releases/download/v${PHALCON_VERSION}/phalcon-php8.1-nts-ubuntu-gcc-x64.zip; \
    7z x phalcon-php8.1-nts-ubuntu-gcc-x64.zip; \
    # Install
    mkdir -p ${PHP_MODULES}; \
    cp phalcon.so ${PHP_MODULES}; \
    chmod 755 ${PHP_MODULES}; \
    chmod 755 ${PHP_MODULES}/phalcon.so; \
    cd /; \
    # Clean
    apk del phalcon_deps; \
    rm -r -f /var/cache/apk/*; \
    rm -r -f /tmp/phalcon/;

### FILESYSTEM ###
RUN set -eux; \
    # Directories
    mkdir --mode=777 --parents \
        # Scripts
        /docker \
        # Adm
        /adm \
        # Data
        /data \
        /data/os \
        /data/apache \
        /data/php \
        /data/php\tmp \
        # Logs
        /logs \
        /logs/os \
        /logs/apache \
        /logs/php \
        # Run
        /run \
        ${HTTPD_RUN} \
        ${HTTPD_RUN}/mutex \
        /run/php \
        # App
        /app \
        /app/public \
    ;

########################################################################################################################
### CONFIG ###
########################################################################################################################
### BACKUP AND CLEAR ###
RUN set -eux; \
    # Apache
    mkdir -p "${HTTPD_ROOT}/original/"; \
    cp "${HTTPD_CONF}" "${HTTPD_ROOT}/original/httpd.conf"; \
    cp -a "${HTTPD_CONFD}/." "${HTTPD_ROOT}/original/conf.d/"; \
    \
    rm -r -f "${HTTPD_CONF}"; \
    rm -r -f "${HTTPD_CONFD}"; \
    mkdir --mode=777 --parents "${HTTPD_CONFD}"; \
    \
    # PHP
    mkdir -p "${PHP_ROOT}/original/"; \
    cp "${PHP_CONF}" "${PHP_ROOT}/original/php.ini"; \
    cp -a "${PHP_CONFD}/." "${PHP_ROOT}/original/conf.d/"; \
    \
    rm -r -f "${PHP_CONF}"; \
    rm -r -f "${PHP_CONFD}"; \
    mkdir --mode=777 --parents "${PHP_CONFD}";

### COMMANDS ###
RUN set -eux; \
    # OS
        # Logs
        ln -s ${OS_LOGS} /logs/os/; \
        # Timezone
        #    echo "tzdata tzdata/Areas select America" | debconf-set-selections; \
        #    echo "tzdata tzdata/Zones/America select Sao_Paulo" | debconf-set-selections; \
        #    rm -f /etc/localtime /etc/timezone; \
        #    dpkg-reconfigure -f noninteractive tzdata
        #apk add tzdata \
        #    && cp /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime
    \
    # APACHE
    ln -s /usr/lib/apache2 "${HTTPD_ROOT}/modules"; \
    ln -s /logs/apache "${HTTPD_ROOT}/logs";
    #ln -s /run/apache2 "${HTTPD_ROOT}/run";

### IMPORTS ###
# OS
COPY ./os/root/.ashrc /root/.ashrc
COPY ./os/docker/ /docker/
COPY ./os/adm/ /adm/
# APACHE
COPY ./apache/httpd.conf "${HTTPD_CONF}"
COPY ./apache/conf.d "${HTTPD_CONFD}"
# PHP
COPY ./php/php.ini "${PHP_CONF}"

########################################################################################################################
## DOCKER ###
########################################################################################################################
STOPSIGNAL SIGWINCH
ENTRYPOINT ["/docker/entrypoint.sh"]
CMD ["RUN"]
