# Postmetria Challenge

## Requisites

This project utilizes Laravel as the backend framework and VueJS for Front, so PHP, Composer, Laravel, Vue, Node, NPM/Yarn are needed to run this project. Also, docker-compose and docker are needed for interacting with data (if for some reason the docker-compose does not create the database, it'll be needed to do this by yourself with the name of "postmetria"). For interacting with the database, the extension pgsql and pdo_pgsql need to be enabled in php.ini and installed on your machine. In your php.ini file, the following things will need to be added:
* php_openssl: remove the ; in ;extension=php_openssl
* pdo_pgsql: remove the ; in ;extension=pdo_pgsql
* pgsql: remove the ; in ;extension=pgsql

the curl extension(;extension=curl) might be needed too. 

In Windows, the SSL for curl needs to be set in your php.ini file. For that, remove the ; in ;curl.cainfo and add the path to your SSL file. You can found the download for this file here: http://curl.haxx.se/ca/cacert.pem

Docker in Windows needs WSL for work.

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
After everything started, the standard port for the backend is 8000 and for the frontend is 8080 (hot command). Insomnia for interacting with routes and pgadmin for the database might be useful. 

There are 3 routes in this application, inside the api.php file, related to /country/: the POST route /country/{country_name}, the GET route /country/{country_name} and the GET /countries. 

##How It Works
The POST route picks the country name by the parameter "country_name", makes a curl request to the public API "Rest Countries V2" with the proper headers attached, executes the function and receives a response, closes the curl and if there is an error it will return this curl error. If there isn't an error, the var $data will handle the decoded JSON $response, select a few data from this response and save it in the entity Country. 

The first GET route, /country/{country_name}, will get a country name by the param of the same name and search for a country with this name. Since the param comes with the string in lowercase, a function ucfirst is called to capitalize the first letter of the string, in the same way that the values of the field "name" in the table "countries" are stored. 

The GET route /countries will return all the countries inserted into the database.

Except for the POST route, all the routes utilize a Resource, that allows Laravel to choose which data will be returned to the client in the route response. 

The migrations are stored inside the migrations directory, from the database folder. Migrations are files that directly interact with the database, creating, updating, and removing/dropping data. In this app, there is one migration for creating the table countries with the wished fields inside the up function.

The frontend is developed in Vue, and interacts directly with the blade file (welcome.blade.php). Inside the JS folder, vue contains the components used in the application, and the App.vue file, that agroups all the components in the main and unique page of the application. 

The file webpack.mix.js contains the configs needed for webpack to work well.
