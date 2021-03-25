# Postmetria Challenge

## Requisites

This project utilizes Laravel as the backend framework and VueJS for Front, so PHP, Composer, Laravel, Vue, Node, NPM/Yarn are needed to run this project. Also, docker-compose and docker are needed for interacting with data (if for some reason the docker-compose does not create the database, it'll be needed to do this by yourself with the name of "postmetria"). For interacting with the database, the extension pgsql and pdo_pgsql need to be enabled in php.ini and installed in your machine. In your php.ini file, the following things will need to be added:
* php_openssl: remove the ; in ;extension=php_openssl
* pdo_pgsql: remove the ; in ;extension=pdo_pgsql
* pgsql: remove the ; in ;extension=pgsql

the curl extension(;extension=curl) might be needed too. 

In Windows, the SSL for curl need to be set in your php.ini file. For that, remove the ; in ;curl.cainfo and add the path to your SSL file. You can found the download for this file here: http://curl.haxx.se/ca/cacert.pem

Docker in Windows need WSL for work.

## How To Install
With all requisites downloaded and installed, type:
* composer update/composer install
* npm install
* docker-composer up
* php artisan migrate
* php artisan key:generate
* php artisan serve 
* npm run hot

## Interacting
After everything started, the standard port for backend is 8000 and for frontend is 8080 (hot command). Insomnia for interacting with routes and pgadmin for the database might be useful.
