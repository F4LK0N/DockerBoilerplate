# Debian 11 - Docker Boilerplate


## Overview  
Provides a clean image of the Linux Debian operational system.  

---



## Development
### Run:
```
docker compose up -d
```
### Access:
```
docker exec -it debian /bin/bash
```

---



## Docker
### Build:
```
docker compose build  
docker compose build --progress=plain  
```
### Run:
```
docker compose up -d
```
### Build and Run:
```
docker compose up -d --build
```
### Access:
```
docker exec -it debian /bin/bash
```

---



## Container
### Data:
```
/data/
```
### Logs:
```
/logs/
```
### Adm:
```
/adm/
/adm/panel.sh
```
### Docker:
```
/docker/
/docker/run.sh
```
