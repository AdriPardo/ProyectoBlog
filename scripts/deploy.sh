#!/bin/bash

rm -r C:/xampp/htdocs/ventas;
rm -r C:/xampp/php/ventas;

mkdir C:/xampp/htdocs/ventas;
mkdir C:/xampp/php/ventas;

cp -r ./dist/web/* C:/xampp/htdocs/ventas;
cp -r ./dist/php/* C:/xampp/php/ventas;