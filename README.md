# Photo Gallery

A basic app for listing, removing and uploading images.

Uses a basic Vue component with a basic api route and standard laravel routes.

## Install

`composer install`

`npm install && npm run dev`

## Docker

* NGINX
* PHP 8.2
* MySQL 8.0.20

### Start Server

`docker-compose up -d --build`

## Improvements

* Add authentication
* Pagination through Vue
* Rerender the component after image removed
  * This requires moving retrieval of images to Axios in Vue component
* Improve test coverage