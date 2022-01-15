# QueueLaravel
![image](https://user-images.githubusercontent.com/49960425/149608862-50811bfb-13f4-4a2f-85b2-1a11005c4778.png)

## About the project

This project is being built to test my skills as a developer and to learn new things. Here I learned more advanced concepts of the Laravel framework, I'm aiming to master them, to become a better professional, and be more capable in what I love

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Setting up the dev env

### `git clone https://github.com/silvasilas99/queue-laravel.git` <br>
Clone the project to your computer

### `composer install` <br>
Inside the people-integration-backend diretory, run this command to install all necessaries packages

### `cp .env.example .env` <br>
Create a .env.local file using the .env.example as base After you must to configure your backend URL

### Create the database, configure the Google API credencials and set it up inside the .env <br>

### `php artisan key:generate`<br>
Generate the key to the project

### `php artisan migrate` <br>
Make the migrations in your database

### `php artisan serve` <br>
Create a WEB server in the development mode and access http://localhost:8000
