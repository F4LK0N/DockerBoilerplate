

Create
```shell
docker volume create --driver local \
    --opt type=none \
    --opt device=/var/opt/my_website/dist \
    --opt o=bind web_data
```
Yml Reference
```yml
version '3'

volumes:
  web_data:
    external: true

services:
  app:
    image: nginx:alpine
    ports:
      - 80:80
    volumes:
      - web_data:/usr/share/nginx/html:ro
```
WiNDOWS PATH
```shell
\\wsl.localhost\docker-desktop-data\data\docker\volumes\web_data
```


https://devopscell.com/docker/docker-compose/volumes/2018/01/16/volumes-in-docker-compose.html


net use w: \\wsl$\docker-desktop-data

sudo mkdir /mnt/docker
sudo mount -t drvfs w: /mnt/docker
