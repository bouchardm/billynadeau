#!/usr/bin/env bash

if [ ! -d vendor ]; then
    composer install
fi

if [ ! -d node_modules ]; then
    npm install
    gulp
fi

if [ ! -f .env ]; then
    cp .env.example .env
    php artisan key:generate
fi

if [ ! -f database.sqlite ]; then
    touch database/database.sqlite
    php artisan migrate
fi

php artisan clear-compiled
php artisan ide-helper:generate
vendor/bin/phpunit