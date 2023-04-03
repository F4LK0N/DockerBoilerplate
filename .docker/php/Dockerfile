FROM php:8.2-apache-bullseye
WORKDIR /

LABEL "org.opencontainers.image.authors"="F4LK0N"
LABEL "org.opencontainers.image.version"="1.0"

########################################################################################################################
### DEBIAN ###
########################################################################################################################
#######################
# Logs #
#######################
# /var/log/
########################################################################################################################
### TIMEZONE ###
RUN set -eux; \
    echo "tzdata tzdata/Areas select America" | debconf-set-selections; \
    echo "tzdata tzdata/Zones/America select Sao_Paulo" | debconf-set-selections; \
    rm -f /etc/localtime /etc/timezone; \
    dpkg-reconfigure -f noninteractive tzdata

### PACKAGES ###
RUN set -eux; \
    apt-get update; \
    apt-get install -y --no-install-recommends \
        procps \
        iftop \
        psmisc \
    ; \
    apt-get purge -y --auto-remove -o APT::AutoRemove::RecommendsImportant=false; \
    apt-get autoremove --purge; \
    apt-get clean; \
    apt-get autoclean; \
    rm -rf \
        /tmp/* \
        /var/tmp/* \
        /var/lib/apt/lists/* \
    ;

### FILESYSTEM ###
# Centralize Folders
RUN set -eux; \
    mkdir -p /app/; \
    mkdir -p /app/public/; \
    mkdir -p /adm/; \
    mkdir -p /docker/; \
    mkdir -p /data/; \
    mkdir -p /logs/; \
    mkdir -p /logs/os/; \
    mkdir -p /logs/apache/; \
    mkdir -p /logs/php/; \
    ln -s /var/log/ /logs/os/;
# Import Content
COPY ./os/root/.bashrc /root/.bashrc
COPY ./os/adm/ /adm/
COPY ./os/docker/ /docker/

########################################################################################################################
### APACHE ###
########################################################################################################################
# Config #
#######################
# /etc/apache2/
#   envvars
#   apache.conf
#   mods-enabled/
#######################
# Logs #
#######################
# /logs/apache/
#   access.log
#   error.log
########################################################################################################################
RUN rm /etc/apache2/apache2.conf; \
    rm /etc/apache2/envvars; \
    rm /etc/apache2/magic; \
    rm /etc/apache2/ports.conf; \
    \
    #rm /etc/apache2/conf-enabled/*; \
    rm /etc/apache2/mods-enabled/*; \
    rm /etc/apache2/sites-enabled/*; \
    rm -r /var/www/;

COPY apache/envvars /etc/apache2/envvars
COPY apache/apache2.conf /etc/apache2/apache2.conf

RUN set -eux; \
    ln -s /etc/apache2/mods-available/access_compat.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/actions.conf /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/actions.load /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/alias.conf /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/alias.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/allowmethods.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/asis.load /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/auth_basic.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/auth_digest.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/auth_form.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/authn_anon.load /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/authn_core.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/authn_dbd.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/authn_dbm.load /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/authn_file.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/authn_socache.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/authnz_fcgi.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/authnz_ldap.load /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/authz_core.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/authz_dbd.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/authz_dbm.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/authz_groupfile.load /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/authz_host.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/authz_owner.load /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/authz_user.load /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/autoindex.conf /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/autoindex.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/brotli.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/buffer.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/cache.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/cache_disk.conf /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/cache_disk.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/cache_socache.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/cern_meta.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/cgi.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/cgid.conf /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/cgid.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/charset_lite.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/data.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/dav.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/dav_fs.conf /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/dav_fs.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/dav_lock.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/dbd.load /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/deflate.conf /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/deflate.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/dialup.load /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/dir.conf /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/dir.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/dump_io.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/echo.load /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/env.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/expires.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/ext_filter.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/file_cache.load /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/filter.load /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/headers.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/heartbeat.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/heartmonitor.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/http2.conf /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/http2.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/ident.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/imagemap.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/include.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/info.conf /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/info.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/lbmethod_bybusyness.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/lbmethod_byrequests.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/lbmethod_bytraffic.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/lbmethod_heartbeat.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/ldap.conf /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/ldap.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/log_debug.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/log_forensic.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/lua.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/macro.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/md.load /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/mime.conf /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/mime.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/mime_magic.conf /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/mime_magic.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/mpm_event.conf /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/mpm_event.load /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/mpm_prefork.conf /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/mpm_prefork.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/mpm_worker.conf /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/mpm_worker.load /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/negotiation.conf /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/negotiation.load /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/php.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/proxy.conf /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/proxy.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/proxy_ajp.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/proxy_balancer.conf /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/proxy_balancer.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/proxy_connect.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/proxy_express.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/proxy_fcgi.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/proxy_fdpass.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/proxy_ftp.conf /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/proxy_ftp.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/proxy_hcheck.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/proxy_html.conf /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/proxy_html.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/proxy_http.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/proxy_http2.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/proxy_scgi.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/proxy_uwsgi.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/proxy_wstunnel.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/ratelimit.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/reflector.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/remoteip.load /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/reqtimeout.conf /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/reqtimeout.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/request.load /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/rewrite.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/sed.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/session.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/session_cookie.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/session_crypto.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/session_dbd.load /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/setenvif.conf /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/setenvif.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/slotmem_plain.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/slotmem_shm.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/socache_dbm.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/socache_memcache.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/socache_redis.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/socache_shmcb.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/speling.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/ssl.conf /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/ssl.load /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/status.conf /etc/apache2/mods-enabled/; \
    ln -s /etc/apache2/mods-available/status.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/substitute.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/suexec.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/unique_id.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/userdir.conf /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/userdir.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/usertrack.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/vhost_alias.load /etc/apache2/mods-enabled/; \
    #ln -s /etc/apache2/mods-available/xml2enc.load /etc/apache2/mods-enabled/; \
    echo "";

########################################################################################################################
### PHP ###
########################################################################################################################



##########################################################################################################################
##### CONTAINER ###
##########################################################################################################################
#STOPSIGNAL SIGWINCH
#ENTRYPOINT ["/docker/entrypoint.sh"]
#CMD ["RUN"]
