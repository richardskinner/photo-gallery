# Photo Gallery

A basic app for listing, removing and uploading images.

Uses a basic Vue component with a basic api route and standard laravel routes.

## Docker

* NGINX
* PHP 8.2
* MySQL 8.0.20

### Start Server

`docker-compose up -d --build`

## CLI Continer

`docker exec -it photo-gallery_php_1 bash`

### Build App

`XDEBUG_MODE=off composer install`
disables xdebug while installing packages otherwise will hang

#### Migrate Tables
`XDEBUG_MODE=off php artisan migrate`
OR
`XDEBUG_MODE=off php artisan migrate:refresh --seed`

For some reason I couldn't get the docker to create the table for me, so for now the laravel table should already exist.
if this does not exist, login into the mysql container and create the DB.

````
docker exec -it photo-gallery_mysql_1 bash
mysql-uroot -p password
CREATE DATABASE laravel;
````

### Compile Vue & SCSS
`npm install && npm run dev`

## Improvements

* Add authentication
* Pagination through Vue
* Rerender the component after image removed
  * This requires moving retrieval of images to Axios in Vue component
* Improve test coverage
* Move upload form to Vue component
* Add new route for single image
  * Add cache for retrieving this image