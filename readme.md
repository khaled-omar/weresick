[![Stories in Ready](https://badge.waffle.io/lordadamson/weresick.png?label=ready&title=Ready)](https://waffle.io/lordadamson/weresick)
# We're Sick
[![Build Status](https://travis-ci.org/lordadamson/weresick.svg?branch=master)](https://travis-ci.org/lordadamson/weresick) <br/>
This is a website based on a philosophy.

## Dependencies
This project uses Laravel 5.2 php framework.
* A typical LAMP/WAMP/XAMP or whatever AMP stack you've got.
* Make sure you have [composer](https://getcomposer.org) installed.
* If you're a windows or mac user you may need laravel homestead.

## Set up development environment
* clone the repo.
* `cd weresick`
* `composer install`
* `mysql -u root -p`
* `create database weresick;`
* `grant all privileges on weresick.* to 'weresickuser'@'localhost'identified by 'password';`
* open the .env.example file and fill in the following part:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=weresick
DB_USERNAME=weresickuser
DB_PASSWORD=password
```
and SAVE AS a new file called: `.env`.
* `exit` to get out of the mysql cmd.
* `php artisan migrate`
* `php artisan key:generate`

You're good to go!

## testing
You may test it with php's built-in webserver: `php -S localhost:8000 -t public/`. <br/>
And then type `localhost:8000` in your browser's address bar.
