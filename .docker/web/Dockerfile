FROM alpine:3.17

LABEL "org.opencontainers.image.authors"="F4LK0N"
LABEL "org.opencontainers.image.version"="1.0"

########################################################################################################################
### SETUP ###
########################################################################################################################
### CONTAINER ###
WORKDIR /
ENV ROOT_DATA="/data"
ENV ROOT_LOGS="/logs"
ENV ROOT_RUN="/run"

### OS ###
ENV ENV="/root/.ashrc"
ENV OS_VERSION="3.17"
ENV OS_DATA="${ROOT_DATA}/os"
ENV OS_LOGS="${ROOT_LOGS}/os"
ENV OS_RUN="${ROOT_RUN}/os"

### APACHE ###
ENV HTTPD_VERSION="2.4"
ENV HTTPD_ROOT="/etc/apache2"
ENV HTTPD_CONF="${HTTPD_ROOT}/httpd.conf"
ENV HTTPD_CONFD="${HTTPD_ROOT}/conf.d"
ENV HTTPD_MODULES="/usr/lib/apache2"
ENV HTTPD_DATA="${ROOT_DATA}/apache"
ENV HTTPD_LOGS="${ROOT_LOGS}/apache"
ENV HTTPD_RUN="${ROOT_RUN}/apache"

### PHP ###
ENV PHP_VERSION="8.1"
ENV PHP_ROOT="/etc/php81"
ENV PHP_CONF="${PHP_ROOT}/php.ini"
ENV PHP_CONFD="${PHP_ROOT}/conf.d"
ENV PHP_MODULES="/usr/lib/php81/modules"
ENV PHP_DATA="${ROOT_DATA}/php"
ENV PHP_LOGS="${ROOT_LOGS}/php"
ENV PHP_RUN="${ROOT_RUN}/php"

### PHALCON ###
ENV PHALCON_VERSION="5.2.1"

### APPLICATION ###
ENV APP_ROOT="/var/www/localhost/htdocs"

########################################################################################################################
### DATA ###
########################################################################################################################
### IMAGES ###
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

### PACKAGES ###
RUN set -eux; \
    apk update; \
    apk add --no-cache \
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
    # Clean
    rm -r -f /var/cache/apk/*;

### DOWNLOADS ###
RUN set -eux; \
    # Dependencies
    apk update; \
    apk add --virtual temp_deps \
        tzdata \
        7zip; \
    \
    # OS - Timezone
        cp /usr/share/zoneinfo/America/Sao_Paulo /etc/localtime; \
        echo "America/Sao_Paulo" > /etc/timezone; \
    # PHP - Phalcon
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
    apk del temp_deps; \
    rm -fr /var/cache/apk/*; \
    rm -fr /tmp/phalcon/;

### FILESYSTEM ###
RUN set -eux; \
    mkdir --mode=777 --parents \
        # Container
        /docker \
        /adm \
        ${ROOT_DATA} \
        ${ROOT_LOGS} \
        ${ROOT_RUN} \
        # OS
        ${OS_DATA} \
        ${OS_LOGS} \
        ${OS_RUN} \
        # Apache
        ${HTTPD_DATA} \
        ${HTTPD_LOGS} \
        ${HTTPD_RUN} \
        # PHP
        ${PHP_DATA} \
        ${PHP_LOGS} \
        ${PHP_RUN} \
        # Application
        ${APP_ROOT} \
    ; \
    chmod 755 ${OS_RUN}; \
    chmod 755 ${HTTPD_RUN}; \
    chmod 755 ${PHP_RUN}; \
    chmod 777 ${APP_ROOT};

########################################################################################################################
### CONFIG ###
########################################################################################################################
RUN set -eux; \
    ### OS ###
        # Logs
        ln -s "/var/log" "${OS_LOGS}/logs"; \
        chmod 777 "${OS_LOGS}/logs"; \
    \
    ### APACHE ###
        # Conf File and Dir
        mkdir --mode=777 "${HTTPD_ROOT}/original"; \
        cp "${HTTPD_CONF}" "${HTTPD_ROOT}/original/httpd.conf"; \
        cp -a "${HTTPD_CONFD}/." "${HTTPD_ROOT}/original/conf.d/"; \
        rm ${HTTPD_CONF}; \
        rm ${HTTPD_CONFD}/*; \
        # CGI
        rm -r "/var/www/localhost/cgi-bin/"; \
        # Logs
        rm "/var/www/logs"; \
        rm -r "/var/log/apache2/"; \
        ln -s "${HTTPD_LOGS}" "/var/www/logs"; \
        chmod 777 "/var/www/logs"; \
        # Run
        rm "/var/www/run"; \
        rm -r "/run/apache2/"; \
        ln -s "${HTTPD_RUN}" "/var/www/run"; \
        chmod 777 "/var/www/run"; \
        mkdir --mode=755 "${HTTPD_RUN}/mutex"; \
        # SSL
        chmod 755 "/etc/ssl/apache2/server.pem"; \
        chmod 755 "/etc/ssl/apache2/server.key"; \
    \
    ### PHP ###
        # Conf File and Dir
        mkdir --mode=777 "${PHP_ROOT}/original"; \
        cp "${PHP_CONF}" "${PHP_ROOT}/original/php.ini"; \
        cp -a "${PHP_CONFD}/." "${PHP_ROOT}/original/conf.d/"; \
        rm ${PHP_CONF}; \
        rm ${PHP_CONFD}/*; \
        # Data
        mkdir --mode=777 "${PHP_DATA}/tmp"; \
    \
    ### APPLICATION ###
        rm "${APP_ROOT}/index.html"; \
        chmod 777 "${APP_ROOT}"; \
        mkdir --mode=777 "${APP_ROOT}/public"; \
        ln -s "${APP_ROOT}" "/src";

### IMPORT ###
# OS
COPY "./os/root/.ashrc" "/root/.ashrc"
COPY "./os/docker/" "/docker/"
COPY "./os/adm/" "/adm/"
# APACHE
COPY --chmod=644 "./apache/httpd.conf" "${HTTPD_CONF}"
COPY --chmod=644 "./apache/conf.d/*" "${HTTPD_CONFD}/"
# PHP
#COPY "./php/php.ini" "${PHP_CONF}"

########################################################################################################################
### DOCKER ###
########################################################################################################################
STOPSIGNAL SIGWINCH
ENTRYPOINT ["/docker/entrypoint.sh"]
CMD ["RUN"]
