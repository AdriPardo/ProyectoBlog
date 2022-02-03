#!/bin/bash

docker container stop adrian_apache

docker container rm adrian_apache

docker container run \
	-d \
	-v /home/alumno/adrian/docker/apache:/var/www/ \
	-p 2012:80 \
  	-e VIRTUAL_HOST=adrian.daw2.fp \
	--network=adrian_red \
	--name adrian_apache \
	php:8.0.14-apache-buster

docker container exec -it adrian_apache docker-php-ext-install pdo pdo_mysql
docker container exec -it adrian_apache a2enmod rewrite
docker container restart adrian_apache
