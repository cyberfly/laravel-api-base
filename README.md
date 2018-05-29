# Laravel API Base

## About

Laravel API Base allows you to jump start your API development quickly, without time consuming installation and setup proces.

## Features

* Manage Laravel Passport clients page
  https://laravel-base-api.test/admin/oauth
* API documentation with Swagger UI, integrated with Laravel Passport
  https://laravel-base-api.test/api/documentation
* LogViewer
https://laravel-base-api.test/admin/logviewer
* All HTTP request data automatically log using Spatie HTTP Logger and can be view from LogViewer

## Packages included

* Laravel Passport
https://laravel.com/docs/5.6/passport
* Laravel Swagger
https://github.com/DarkaOnLine/L5-Swagger
* GuzzleHTTP
https://github.com/guzzle/guzzle
* Laravel CORS
https://github.com/barryvdh/laravel-cors
* Spatie HTTP Logger
https://github.com/spatie/laravel-http-logger
* Arcanedev Log Viewer
https://github.com/ARCANEDEV/LogViewer

## Installation

* git clone git@srv.nazrol.tech:internal/laravel-api-base.git
* composer install
* php artisan key:generate
* update your database config at .env file
* copy specific config from .env.example into .env file
* php artisan migrate
* enjoy!