FROM alpine:3.17
WORKDIR /

LABEL "org.opencontainers.image.authors"="F4LK0N"
LABEL "org.opencontainers.image.version"="1.0"

########################################################################################################################
### ALPINE ###
########################################################################################################################
### SHELL ###
ENV ENV="/root/.ashrc"

#### FRONTEND ###
#ARG DEBIAN_FRONTEND noninteractive

#### TIMEZONE ###
#RUN set -eux; \
#    echo "tzdata tzdata/Areas select America" | debconf-set-selections; \
#    echo "tzdata tzdata/Zones/America select Sao_Paulo" | debconf-set-selections; \
#    rm -f /etc/localtime /etc/timezone; \
#    dpkg-reconfigure -f noninteractive tzdata

### APK ###
RUN set -eux; \
    apk add --no-cache --update \
        # OS
        openrc \
        iftop \
        curl \
        # Apache
        apache2 \
        apache2-ssl \
        # PHP
        php81-apache2 \
        #php81-bcmath \
        #php81-bz2 \
        #php81-calendar \
        php81-common \
        #php81-ctype \
        php81-curl \
        #php81-dom \
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
        #php81-xml \
        php81-session \
        php81-pecl-xdebug;

### FILESYSTEM ###
# Centralize Folders
RUN set -eux; \
    # Docker
    mkdir -p /docker/; \
    # Adm
    mkdir -p /adm/; \
    # Data
    mkdir -p /data/; \
    # Logs
    mkdir -p /logs/; \
    mkdir -p /logs/os/; \
    ln -s /var/log/ /logs/os/; \
    mkdir -p /logs/apache/; \
    mkdir -p /logs/php/; \
    # Application
    mkdir -p /app/ \
    mkdir -p /app/public/;
# Import Content
COPY ./os/root/.ashrc /root/.ashrc
COPY ./os/docker/ /docker/
COPY ./os/adm/ /adm/

########################################################################################################################
### APACHE ###
########################################################################################################################
# Config #
#######################
# /etc/apache2/
#   httpd.conf
#######################
# Logs #
#######################
# /logs/apache/
#   access.log
#   error.log
########################################################################################################################
ENV HTTPD_ROOT=/etc/apache2
ENV HTTPD_LOGS=/logs/apache

RUN set -eux; \
    ln -s /usr/lib/apache2 "${HTTPD_ROOT}/modules"; \
    ln -s /logs/apache "${HTTPD_ROOT}/logs"; \
    ln -s /run/apache2 "${HTTPD_ROOT}/run";

COPY apache/httpd.conf "$HTTPD_ROOT/httpd.conf"

########################################################################################################################
### PHP ###
########################################################################################################################
# Config #
#######################
# /etc/php81/
#   php.ini
#######################
# Logs #
#######################
# /logs/php/
#   error.log
########################################################################################################################
ENV PHP_ROOT=/etc/php81
ENV PHP_LOGS=/logs/php

RUN set -eux; \
    rm -r -f "$PHP_ROOT/conf.d/"; \
    mkdir -p "$PHP_ROOT/conf.d/";

COPY php/php.ini "$PHP_ROOT/php.ini"

########################################################################################################################
## DOCKER ###
########################################################################################################################
STOPSIGNAL SIGWINCH
ENTRYPOINT ["/docker/entrypoint.sh"]
CMD ["RUN"]
