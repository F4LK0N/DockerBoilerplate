FROM debian:11-slim

LABEL "org.opencontainers.image.authors"="F4LK0N"
LABEL "org.opencontainers.image.version"="1.0"

########################################################################################################################
### DEBIAN SYSTEM ###
########################################################################################################################
# Update and Install Packages
RUN apt-get update
#RUN apt-get install -y iputils-ping
RUN apt-get update
RUN apt-get upgrade -y

# Clean
RUN apt-get autoremove
RUN apt-get clean
RUN rm -rf /tmp/*
RUN rm -rf /var/tmp/*
RUN rm -rf /var/lib/apt/lists/*

# Setup Container
RUN mkdir /docker
COPY docker/run.sh /docker/run.sh

# Entrypoint Run Command
CMD /docker/run.sh
