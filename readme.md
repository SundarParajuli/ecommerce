## Laravel Backend

## To run this project go to the project root and run:
php artisan serve

## to setup project if composer install didnt work
--------install php -----------
--------install composer--------
--------install laravel--------
--------install mysql server/client
--------install mysql workbench or other client----

##run project 
composer install 

if it throws error run this command on project

cd bootstrap/cache/
rm -rf *.php

then run php artisan serve

##to generate application key run:
php artisan key:generate

##to generate database schema
php artisan migrate
php artisan migrate:fresh --seed

## to run
php artisan serve

## to change database credentials and ports
database.php
