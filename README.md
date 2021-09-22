<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="200"></a></p>

## Simple REST API with Laravel

Most important files:
- Routes: routes/api.php
- Controllers: app/Http/Controllers/API/UserController.php, app/Http/Controllers/API/BookController.php, app/Http/Controllers/API/UserBookController.php
- Resources: app/Http/Resources/UserResource.php, app/Http/Resources/BookResource.php, app/Http/Resources/UserBookCollection.php
- Models: app/Models/User.php, app/Models/Book.php
- Services: app/Services/SmsApi.php
- Tests: tests/Feature/UserTest.php, tests/Feature/BookTest.php, tests/Feature/UserBookTest.php, tests/Unit/SmsApiTest.php

## Tests
php artisan test

The test that sends the text message is commented out. Change phone number and uncomment.


## Database schema
rest-api.sql

## Swagger documentation
swagger/docs

