#!/bin/sh

cd /app  
php artisan migrate:refresh --seed
php artisan serve --host=0.0.0.0 --port=$APP_PORT