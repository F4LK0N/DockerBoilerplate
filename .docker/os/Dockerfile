FROM debian:11-slim

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
RUN rm -r -f /tmp/*

# Setup Container
RUN mkdir /docker
COPY docker/run.sh /docker/run.sh

# Entrypoint Run Command
CMD /docker/run.sh
