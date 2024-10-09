


## how to run :
- download xxamp and open apache and sqlite servers
- Create a database locally named `laravel` in phpmyadmin
- Download composer https://getcomposer.org/download/
- clone or Pull Laravel/php project from github.
- Rename `.env.example` file to `.env`inside your project root and fill the database information.
  (windows wont let you do it, so you have to open your console cd your project root directory and run `mv .env.example .env` )
- Open the console and cd your project root directory
- Run `composer install` or ```php composer.phar install```
- Run `php artisan key:generate` 
- Run `php artisan migrate`
- Run `php artisan db:seed` to run seeders, if any.
- Run `php artisan serve`

### You can now access your project at localhost:8000/posts
if any issues , follow this article [How to Run an Existing Laravel Project](https://mumin-ahmod.medium.com/how-to-run-an-existing-laravel-project-f99a70c0f112)