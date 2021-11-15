# Sigma Online Formation

## Context

    Sigma is a online plateform which allows user to learn from other users on difference cateogries.

    Everyone can join sigma. You can be a normal student or a teacher.

    To become a teacher, you need register your account and wait for admin to validate your account.

    Once your account is validated by admin, you will see all functionalities to create, update and delete your courses.

## MCD

![alt text](https://github.com/DavithCH/sigma-online-formation/blob/main/public/MCD.PNG?raw=true)

## Guide

> -   Create .env file on root directory and copy all content from .env.example file to it
> -   Create your database and than connect your laravel app by changing the requirements in .env

> -   Configure your mail to able to work with mailing systems

> -   run `composer update` to generate all dependencies

> -   run command `npm install` to install all nessesary dependencies such as tailwind css library

> -   on app/Providers/AppServiceProvider.php : inside the `boot` function, select code and uncomment it before running the next command and enable it back after finish migration

> -   run command `php artisan migrate:fresh --seed` to inject migrate all seed to database

> -   run `php artisan serve` to start the servers
