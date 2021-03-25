<p align="center">Postmetria Challenge</p>

## Requisites

This project utilizes Laravel as the backend framework and VueJS for Front, so PHP, Composer, Laravel, Vue, Node, NPM/Yarn are needed to run this project. Also, docker-compose and a PostgreSQL are needed for interacting with data (if for some reason the docker-compose does not create the database, it'll be needed to do this by yourself). For interacting with the database, the extension pgsql and pdo_pgsql need to be enabled in php.ini and installed in your machine. 

## How To Install
With all requisites downloaded and installed, type:
1- composer install
2- yarn/npm install
3- docker-composer up
4- php artisan migrate
5- php artisan serve 
