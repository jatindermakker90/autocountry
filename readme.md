## Pivot

AutoCountry Project

## Laravel 9

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, queueing, and caching.

Laravel is accessible, yet powerful, providing tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

### Official Documentation

Documentation for the framework can be found on the [Laravel website](https://laravel.com/docs/9.x).


# Installation

## Step 1

### With GIT
Clone git repository

with HTTPS
```
git clone https://github.com/jatindermakker90/autocountry.git
```

Go to the project folder
```
cd folder
```

Update composer
```
composer update or composer install (first time)
```

## Step 2
Copy ```.env.example``` file to ```.env```

For Linux
```
cp .env.example .env
```
For Windows
```
copy .env.example .env
```

And then, run this commands

```
php artisan key:generate
```
Configure your ```.env``` file with databse and run :
```
php artisan migrate
```
After Configure your ```.env``` file and run for create (admin user) with roles :
```
php artisan db:seed

```
You are ready for a new Laravel 9 application  !!
