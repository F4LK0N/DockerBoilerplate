#!/bin/sh
set -e



echo "FILESYSTEM - CLEAN";
rm -rf ${OS_LOGS} \
rm -rf ${OS_RUN} \
rm -rf ${HTTPD_LOGS} \
rm -rf ${HTTPD_RUN} \
rm -rf ${PHP_LOGS} \
rm -rf ${PHP_RUN};

echo "FILESYSTEM - CREATE";
# Container
mkdir --mode=777 --parents /docker
mkdir --mode=777 --parents /adm
mkdir --mode=777 --parents ${ROOT_DATA}
mkdir --mode=777 --parents ${ROOT_LOGS}
mkdir --mode=777 --parents ${ROOT_RUN}
# OS
mkdir --mode=777 --parents ${OS_DATA}
mkdir --mode=777 --parents ${OS_LOGS}
mkdir --mode=777 --parents ${OS_RUN}
# Apache
mkdir --mode=777 --parents ${HTTPD_DATA}
mkdir --mode=777 --parents ${HTTPD_LOGS}
mkdir --mode=777 --parents ${HTTPD_RUN}
mkdir --mode=777 --parents ${HTTPD_RUN}/mutex
# PHP
mkdir --mode=777 --parents ${PHP_DATA}
mkdir --mode=777 --parents ${PHP_DATA}/tmp
mkdir --mode=777 --parents ${PHP_DATA}/upload_tmp
mkdir --mode=777 --parents ${PHP_DATA}/sessions
mkdir --mode=777 --parents ${PHP_LOGS}
mkdir --mode=777 --parents ${PHP_RUN}
# Application
mkdir --mode=777 --parents ${APP_ROOT}
mkdir --mode=777 --parents ${APP_ROOT}/public

echo "FILESYSTEM - PERMISSIONS";
# Container
chmod 777 /docker
chmod 777 /adm
chmod 777 ${ROOT_DATA}
chmod 777 ${ROOT_LOGS}
chmod 777 ${ROOT_RUN}
# OS
chmod 777 ${OS_DATA}
chmod 777 ${OS_LOGS}
chmod 777 ${OS_RUN}
# Apache
chmod 777 ${HTTPD_DATA}
chmod 777 ${HTTPD_LOGS}
chmod 777 ${HTTPD_RUN}
chmod 777 ${HTTPD_RUN}/mutex
# PHP
chmod 777 ${PHP_DATA}
chmod 777 ${PHP_DATA}/tmp
chmod 777 ${PHP_DATA}/upload_tmp
chmod 777 ${PHP_DATA}/soap_tmp
chmod 777 ${PHP_DATA}/sessions
chmod 777 ${PHP_LOGS}
chmod 777 ${PHP_LOGS}/xdebug
chmod 777 ${PHP_RUN}
# Application
chmod 777 ${APP_ROOT}
chmod 777 ${APP_ROOT}/public



echo "OS - LOGS";
ln -s /var/log/ ${OS_LOGS}

echo "APPLICATION - COMPOSER"
if [[ ! -f "${APP_ROOT}/composer.json" ]]; then
    echo "- 'composer.json' not found!"
else
    echo "- 'composer.json' found!"

    if [[ -f "${APP_ROOT}/composer.lock" ]]; then
        echo "- 'composer.lock' found!"
        echo "- Skipping installation."
    else
        echo "- 'composer.lock' not found!"
        echo "- Starting installation."

        composer install -d ${APP_ROOT}
    fi

fi
