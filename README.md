# PHP 8.1
This project creates a image to serve as base image for your next projects.  
It comes with all its essential functionalities already installed and configured to start development.  

.
# Adm
The Falkon Administrative Tools Panel (Adm) are included in this project.  
It provides a panel with useful commands and tools to help monitor and manage the system.  
You can customize the adm panel accordingly to your need, all the scripts are located at: ``` /adm/ ``` and are in the bash format.  
To access the panel, on a CLI terminal inside the OS container, just type:  
```
adm
```

.
# File System
Important files and folders are centralized in root folders to facilitate access.  
- ``` /data/ ``` Data that must persist across container rebuilds;
- ``` /logs/ ``` Log files and folders used by the system and applications;
- ``` /docker/ ``` Scripts used by docker to setup and run the container;
- ``` /adm/ ``` Scripts from the Adm Panel;  

> :information_source: Some logs can't be configured to save directly to the logs folder, in this cases an symbolic link (shortcut) has been created inside the logs folder to facilitate access.  
> :warning: When mapping the logs folder from the container as a volume to the local filesystem, the symbolic links don't appear in the local system, to see this links you must enter the container.  

.
# Operational System
This image is based on the official Docker image of the Alpine Operational System.

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
	docker compose exec -it php /bin/sh

.
# Development
### Run
	docker compose up -d	
### Access
	docker compose exec -it php /bin/sh
