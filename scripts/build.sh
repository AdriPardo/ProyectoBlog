#!/bin/bash

rm -r ./dist;

mkdir ./dist;

cd ./src/php/;

npm run production;

cd ../../;

mv ./src/php/public ./dist/web;

cp -r ./src/* ./dist;

read;