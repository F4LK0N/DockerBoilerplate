FROM debian:11
WORKDIR /

LABEL "org.opencontainers.image.authors"="F4LK0N"
LABEL "org.opencontainers.image.version"="1.0"

########################################################################################################################
### DEBIAN ###
########################################################################################################################
### FRONTEND ###
ARG DEBIAN_FRONTEND noninteractive

### TIMEZONE ###
RUN echo "tzdata tzdata/Areas select America" | debconf-set-selections && \
    echo "tzdata tzdata/Zones/America select Sao_Paulo" | debconf-set-selections && \
    rm -f /etc/localtime /etc/timezone && \
    dpkg-reconfigure -f noninteractive tzdata

#### APT-GET ###
## Update and Upgrade
RUN apt-get update -y && \
    apt-get upgrade -y
# Install
RUN apt-get install -y procps iftop
## Update and Upgrade
#RUN apt-get update \
#    apt-get upgrade -y
## Clean
#RUN apt-get autoremove \
#    apt-get clean \
#    rm -rf /tmp/* \
#    rm -rf /var/tmp/* \
#    rm -rf /var/lib/apt/lists/*



### CONF ###
COPY ./root/.bashrc /root/.bashrc

### DATA ###
RUN mkdir -p /data/

### LOGS ###
RUN mkdir -p /logs/
RUN mkdir -p /logs/debian/
RUN ln -s /logs/debian/ /var/log/

#### ADM ###
RUN mkdir -p /adm/
COPY ./adm/ /adm/

### DOCKER ###
RUN mkdir -p /docker/
COPY ./docker/ /docker/
ENTRYPOINT ["/docker/run.sh"]
# CMD /docker/run.sh
