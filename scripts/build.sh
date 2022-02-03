#!/bin/bash

rm -r ./dist;

mkdir ./dist;

cp -r ./src/* ./dist;

sass ./dist/web/scss/main.scss ./dist/web/css/main.css;

rm -r ./dist/web/scss;
rm -r ./dist/web/ts;