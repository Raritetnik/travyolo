#!/bin/sh

# Update code from git
git pull

# Link to environment prod server
rm .env
ln -s .env_prod .env

# Artisan
php artisan migrate
php artisan cache:clear
php artisan view:clear
php artisan config:cache
chmod -R 777 resources/lang
