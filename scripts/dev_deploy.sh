#!/bin/sh

# Update code from git
git pull

# Link to environment develop server
rm .env
ln -s .env_dev .env

# Artisan
php artisan migrate
php artisan cache:clear
php artisan view:clear
php artisan config:cache
chmod -R 777 resources/lang

