#!/usr/bin/env bash
echo "Installing dependencies..."
composer install --no-dev --optimize-autoloader

echo "Caching configurations..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

echo "Running database migrations..."
php artisan migrate --force

#Render needs to know what commands to run when installing your app. Create a shell script named build.sh in the root directory of your Laravel project:
