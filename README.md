# Boilerplate
**by Otavio Bernardes Soria (aka. F4lk0n)**

---

.
# Overview
This project is focused on accelerating local web development.  

The idea is to provide all the resources needed to run one entire project in containers on isolated environment.  

You should be able to run multiple projects locally at the same time without interfering with each other.  

Ready to start developing immediately. Every environment come already with all operational systems, servers, languages and/or frameworks installed, setuped, configured and running. 

Easy to monitor and customize environments accordingly to your needs.  

All important resources are centralized with shortcuts inside each container.

The environments can also be easily deployed in production with few modifications according to the target cloud provider you will use (Amazon, Google Cloud Platform, Azure, etc.).

.
# Design
Docker Compose is used to define the structure of containers for each environment.

The project structure is designed to separate **Docker** containers files from **Application** files.  

The containers structure are designed to centralize important resources to facilitate monitoring and customizing environments accordingly to your needs. Container filesystem can be mapped to local project as Docker volumes to help development.  

## Project File System
| | |
| -- | -- |
| ```/#DOCs/```:   | **Documentation** manuals, tutorials and references of your project. |
| ```/.docker/```: | **Docker** containers configurations and files. |
| ```/src/```:     | **Application** configurations and files. |
| ```/logs/```:    | **Logs** mapped containers volumes. |
| ```/data/```:    | **Data** mapped containers volumes. |

## Containers File System
| | |
| -- | -- |
| ```/docker/``` | **Scripts** used by docker to initialize, setup, run and maintain the containers. |
| ```/logs/```   | **Logs** centralized to facilitate monitoring. |
| ```/data/```   | **Data** that can persist across container rebuilds. (like databases and sessions) |
| ```/app/```    | **Application** configurations and data. |

.
# Customizations
Configurations and changes made in containers are detailed in documentations folder.  

Containers configurations, scripts and other files added during build (like php.ini, httpd.conf, .bashrc, entrypoint.sh) are available in the project under:  
`'/.docker/container_name/path/inside/the.container'`  

Container files can be mounted as volume binds to facilitate the customization process or tho activate data persistence across container rebuilds.  

.
# Example
**Project A:** Back-end environment with one main container with Apache, PHP, Phalcon and the Application code, a second container with MySQL, and a third container with Redis.  

**Project B:** Front-end environment with one main container with Apache, PHP, Slim, Bootstrap and the Application code, a second container with NodeJS to perform JS and CSS files minification.  

This projects should be able to run simultaneously in your local machine without interfering with each other just customizing the exposed ports of them.  

For production deployment the docker file can be customized to deploy just the main containers of each project and use the other services (Databases, Caches, etc) from the cloud provider.  

.
# Adm
The F4lk0n Administrative Tools Panel (Adm) are included in this project.  
It provides a panel with useful commands and tools to help monitor and manage each container.  
You can customize the adm panel accordingly to your need, all the scripts are located at: ``` /adm/ ``` and are in the bash format.  
To access the panel, on a container's CLI terminal, just type the command:  
```
adm
```

.
# Environments
Every branch on this project is a different Docker Environment for a common Web development scenario.  

**Operational System:** Clean Linux operational system distribution with the minimum required packages to work with the F4lk0n Administrative Tools Panel.  

**Server:** Popular web servers installed on top of a Operational System environment.  

**Language:** Popular web languages installed on top of a Server or Operational System environment.  

**Framework** Popular web frameworks installed on top of a Language environment.

**Resource** Popular web resources used during development.  

**Project** Full project environment with all its dependencies.

Available environments:  

| Type                 | Branch          | Size   | Content |
|----------------------|-----------------|--------|---------|
| Operational System   | alpine3.17      | 000 MB | Alpine 3, Adm |
| Operational System   | debian11        | 000 MB | Debian 11, Adm |
| --- |--- | --- | --- |
| Server               | apache2.4       | 000 MB | Alpine 3, Adm, Apache 2.4 |
| Server               | deb-apache2.4   | 000 MB | Debian 11, Adm, Apache 2.4 |
| --- |--- | --- | --- |
| Language             | php8.1          | 000 MB | Alpine 3, Adm, Apache 2.4, PHP 8.1 |
| Language             | deb-php8.2      | 000 MB | Debian 11, Adm, Apache 2.4, PHP 8.2 |
| Language             | nodejs19        | 000 MB | Alpine 3, Adm, NodeJS 19 |
| --- |--- | --- | --- |
| Framework            | phalcon5.2      | 000 MB | Alpine 3, Adm, Apache 2.4, PHP 8.1, Phalcon 5.2 |
| --- |--- | --- | --- |
| Resource             | mysql8          | 000 MB | MySQL 8 |
| Resource             | phpmyadmin      | 000 MB | PHP My Admin |
| Resource             | redis           | 000 MB | Redis |
| Resource             | elasticsearch   | 000 MB | Elasticsearch |
| --- |--- | --- | --- |
| Project              | fullstack       | 000 MB | Alpine 3, Adm, Apache 2.4, PHP 8.1, Phalcon 5.2, F4lk0n Core Fullstack |
| Project              | web             | 000 MB | Alpine 3, Adm, Apache 2.4, PHP 8.1, Phalcon 5.2, F4lk0n Core Frontend |
| Project              | api             | 000 MB | Alpine 3, Adm, Apache 2.4, PHP 8.1, Phalcon 5.2, F4lk0n Core Backend |

> !!! WARNING !!!  
> THIS IS A WORK IN PROGRESS  
> Some branches are still in development or are not released yet. With time all branches will be available, and more will be added.

# Final Words
I hope this can be useful for your project developments. Use and modify it as you need. Enjoy!  
You can contact me about any doubts you may have, suggestions and pull requests are welcome, just try to keep the same code standards.  
