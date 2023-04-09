# Project
Overview of the project here.

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
	docker exec -it container-a /bin/bash
	docker exec -it container-b /bin/bash

.
# Development
### Run
	docker compose up -d	
### Access
	docker exec -it container-a /bin/bash
	docker exec -it container-b /bin/bash
