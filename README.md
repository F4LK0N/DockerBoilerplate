# Debian 11
This project creates a image to serve as base image for your next projects.  
It comes with all its essential functionalities already configured and customizable.  
Important filesystem contents like 'logs' and persistent 'data' are all centralized inside the containers and maped to external folder in the local project.  

.  

# OS
This image is based on the Linux Debian 11 Slim operational system oficial Docker image.

.  

# Falkon Adm
The Falkon Administration Panel is included.  
It provides a panel with useful tools to help system monitoring and management.  
### Access
Inside the container, just type in the cli terminal:

	adm
### Customize
You can also customize the scripts accordingly to your need, they are located at:  
``` /adm/ ```

.  

# Docker
### Build
	docker compose build  
	docker compose build --progress=plain  
### Run
	docker compose up -d
### Build and Run
	docker compose up -d --build
### Access
	docker exec -it debian /bin/bash

.  

# Development
### Run
	docker compose up -d	
### Access
	docker exec -it debian /bin/bash
