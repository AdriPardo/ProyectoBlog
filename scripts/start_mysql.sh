#!/bin/bash

docker container stop adrian_mariadb

docker container rm adrian_mariadb

docker container run \
   -d \
   -v /home/alumno/adrian/docker/mariadb:/var/lib/mysql  \
   -e MYSQL_ROOT_PASSWORD=root  \
   -p 1012:3306  \
   --network=adrian_red \
   --name adrian_mariadb \
   mariadb:10.5.3

