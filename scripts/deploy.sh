#!/bin/bash

rm -r ./docker/apache/html/blog;
rm -r ./docker/apache/php/blog;

mkdir ./docker/apache/html/blog;
mkdir ./docker/apache/php/blog;

cp -r ./dist/web/* ./docker/apache/html/blog;
cp -r ./dist/php/* ./docker/apache/php/blog;

npm run start_apache;
npm run start_mysql;


read;