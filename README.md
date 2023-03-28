# Docker Boilerplate
**by Otavio Bernardes Soria (aka. F4lk0n)**

---

## Overview
The objective of this project is to provide a boilerplate Docker project, focused on web development, with everything already configured and ready to start local development, and all configurations centralized and easy to access, providing rapidly and easy customization of any aspect of the enviroment as needed.

## Design
This project is focused in web development. 

The ideia is to provide a local isolated container environment, representing one entire project with all its dependencies, in your local machine. And that you can run multiple containers at the same time without interfering with each other.  

The Docker Composer is used to easy define this structure of multiple containers isolated by environment.

### File System
The folders structure are designed to separate the docker configurations and data layers from your application layer. 
- Containers configuration files are stored in ```./.docker/```
- Containers mapped log files and persistent data are stored in ```./data/```
- Application related files are stored in ```./src/```

### Configurations and Logs
Every environment come with all servers and languages already configured and ready to start developing locally. But it also centralize all configurations to let it easy to customize the enviroments and container accordly to your needs.  

Log Folders and other usefull folders from the environments are mapped to local project folders to facilitate access and to provide logs persistence even if the containers are rebuild.

The enviroments can also be easily deployed in production with few modifications according to the target cloud provider you will use (Amazon, Google Cloud Platform, Azure, ect.).

### Customizations
All the configurations made in the container are explained in the README.md file, together with a guide with default
value and most used values to modify and customize it according to your needs.
Every configuration file (like php.ini, httpd.conf, .bashrc) used in the containeres is also available under:  
`'.docker/container_name/path/inside/the.container'`
The configuration files are mounted as volume binds to centralize all the confs in one place on the host, and to don't
need to rebuild the container at every modification on conf files, just a service restart to reload the config.

**Example:**  
Project A: Back-end with one container with Apache, PHP, Phalcon and the Application code, a second container with MySQL, and another container with Redis.  

Project B: Front-end with one container with Apache, PHP, Slim and Bootstrap, a second container with NodeJS to perform the JS and CSS files minifications.  

This projects can run simultaneosly in your local machine without interfering with each other just customizing the exposed ports of them.  

For production deployment the docker file can be customized to deploy just the first container of each project and use the other services (Databases, Caches, etc) from the cloud provider.

## Environments
The environments provided starts with clean Linux operational systems images, where you can start a fresh project from scratch, but with all configuration files already mapped to easy to access locations, also as the o.s. logs folders and other useful folders mapped to local volumes to provide easy access and persistency.  

After that are provided environment with the main web servers used in the market, like Apache and NGINX, simply configured to run in the isolated containers environment and start developing.

And them the container containing the web focused scripting languages, like PHP and NodeJS, also configured and ready to use and start developing. This environments usually come with a production configuration template to facilitate deploy in final cloud environments.  

Every branch is a different Docker Environment for a different need, the available branches are:  

| Type                 | Branch                             | Content         |
|----------------------|------------------------------------|-----------------|
| Operational System   | os-debian11                        | Debian 11       |
| Operational System   | os-alpine3.16                      | Alpine 3.16     |
| Server               | svr-apache2.4                      | Apache 2.4      |
| Server               | svr-nginxX.X                       | NGINX X.X       |
| Language             | lang-php8.2                        | PHP 8.2         |
| Language             | lang-nodejsXXX                     | Node 19         |
| Platform             | plat-mysql8                        | MySQL 8         |
| Platform             | plat-phpmyadmin                    | XXX             |
| Platform             | plat-redis                         | XXX             |
| Platform             | plat-elasticsearch                 | XXX             |
| Complete Environment | php8                               | Debian 11, Apache 2.4, SSL, PHP 8.1, XDebug, Composer, PHP Unit |
| Complete Environment | php8-fpm                           | Alpine 3.16, NGINX X.X, PHP 8.1 |
| Complete Environment | nodejs19                           | Alpine 3.16, NodeJS 19 |


> !!! WARNING !!!  
> THIS IS A WORK IN PROGRESS  
> Some branches are stiil in development or are not released yet. With time all branches will be available, and more will be added.

## Final Words
I hope this can be useful for your project developments. Use and modify it as you need. Enjoy!  
You can contact me about any doubts you may have, suggestions and pull requests are welcome, just try to keep the same code standards.
