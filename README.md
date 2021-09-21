## PHP Version

This app requires `PHP8.0` and `MySQL >= 5.7`

## Environment variables (.env)

Make a copy of `.env.example` for the application `.env` file

The `.env.example` already contains the Ice And Fire API url

## Migrations

Run `php artisan migrate` to create the needed table(s) after setting up the database with necessary configurations

## Tests & data
Tests can be run using `php artisan test` command. All tests are written using Pest-PHP

Run `php artisan db:seed` to create test data in the tables

## Code References

All code references are located in `app/Domain` and views are located in `app/views`

Laravel Livewire is used for the frontend views

## Exception handler

All `NotFoundHttpException` exceptions originating from api routes are handled in `app/Exception/Handler` to send a json response

## Internet connection for CDN urls

Two CDN urls are required for the datepicker component (bundled with the frontend view) to work.
This requires internet connection to be available for the datepicker component to work.
