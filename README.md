<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Cloning and configure a Laravel project from GitLab

This document will guide you through the process of cloning a GitLab project that uses the Laravel PHP framework. By following these steps, you will be able to successfully clone a Laravel project and set up your local environment.

## Prerequisites

Ensure you have the following software installed on your local machine:

-   Install Git (https://git-scm.com/downloads).
-   Install Composer V2.4.4 (https://getcomposer.org/download/2.4.4/composer.phar).
-   Install XAMP V8.2.4 toolset (Php, MySQl,..) (https://sourceforge.net/projects/xampp/files/XAMPP%20Linux/8.2.4/xampp-linux-x64-8.2.4-0-installer.run).
- Install NodeJs V18.16.1 (https://nodejs.org/dist/v18.16.1/node-v18.16.1-linux-x64.tar.xz)

    -   Or Manually installation :
        -   MySql Server (https://dev.mysql.com/downloads/installer/).
        -   Php toolchain with downloading and unzip PHP package (https://www.php.net/downloads).
            -   Add this folder to path variable Env System.
            -   Rename php config dev to php.ini and uncomment theses following lines.
                -   extension_dir = 'ext'
                -   extension=curl
                -   exetension=fileinfo
                -   extension=openssl

    **Laravel**

execute in terminal:

> composer global require laravel/installer

## Steps

### 1. Cloning the repository

First, clone the repository on your local machine. Open a terminal and run the following command, replacing url-of-repository with the URL of the repository you want to clone:

execute in terminal:

> **git clone** project_url

### 2. Change directory to the project

Once cloned, change the directory to the project by running the following command:

> **cd** project_name

### 3. Installing dependencies

Install the Laravel project dependencies using Composer.

> **composer** install

Install the Vue framework dependencies using npm.

> **npm** install

### 4. Copy the .env.example file

Laravel uses an .env file to store the environment settings.

Create a new .env file from :

-   .env_local : For local development.

    > **cp** .env_local .env

-   .env_dev : For dev server deploiement.

    > **cp** .env_dev .env

-   .env_prod : For prod server deploiement.
    > **cp** .env_prod .env

### 5. Generating the application key

Generate a new application key for the Laravel project

> php artisan key:generate

### 6. Installing the database

To get the database, you have to execute the sql script which is in the following folder of the project:

>/opt/lampp/bin/mysql -u root -p (Password Enter)

> create database travyolo;

/opt/lampp/bin/mysql -u root -p laravel < ./database/BD_travyolo.sql

[BD_travyolo.sql](./database/BD_travyolo.sql)

after retrieving it, you must run the script on Phpmyadmin

### 7. Start the Development Server

With Laravel and Vue.js running side-by-side, we need to ensure both servers are up and running.

First, start the Laravel development server:

> php artisan serve

This will typically serve your Laravel application on http://127.0.0.1:8000 (unless specified otherwise).

For the frontend, simply run:

> npm run dev

By default, your Vue.js components will be served on http://localhost:5173. Or You can change this by specifying the port number like this:

> php run dev -- --port 3000

You can now access the cloned project in your web browser by navigating to the address displayed in the terminal (usually http://127.0.0.1:8000).

For production, remember to build your assets before deploying the application by running :

> npm run build

This compiles and minifies the JavaScript and CSS files for optimal performance in a production environment.

# Running the Laravel project tests

Laravel comes with Automated Tests, which help in dividing your code into units and then testing each unit to report any errors. It aids in developing new functions and ensuring that the new code does not break the existing one.

The tests for the functions developed in the project already have their tests written.

When running tests, you have two options:

http://localhost:8000

## Running all the tests at once

To run all the tests at once, use:

> php artisan test

You will see a list of all the tests and their results. If one or some test(s) did not pass, the name and the reason for the failure will be displayed in the terminal.

## Running specific tests

To run a specific folder or a specific test, use:

> php artisan test --filter nameOfFolder
> Or
> php artisan test --filter nameOfTest

_Note that if your test names all start with the same prefix, such as 'nameOfTheTest', 'nameOfTheTestTwo', etc., the second command-line interface (CLI) will run all the tests that start with 'nameOfTheTest'._

**Some tests may return false, but it does not necessarily mean that there is an error in the function. It could be an SQL error caused by a foreign key or a duplicated primary key (particularly for the insert functions). We recommend that you test those functions separately and multiple times to ensure that the failure response is not due to the database.**
