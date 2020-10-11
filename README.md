<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

## Laravel-Vue-Products-App with AWS Elastic Beanstalk CodePipeline 

This project uses:
- Laravel 8
- Vue.js
- Bootstrap
- MySQL

The application consists of a two Vue.js applications that communicate with the Laravel 8 application via a REST API.

## The most important files:

### Front End (Vue.js)

- Private ProductsAdmin component [ProductsAdmin.vue](https://github.com/craigpj/Laravel-Vue-Products-App/blob/main/resources/js/components/ProductsAdmin.vue).
- Admin appAdmin.js [app.js](https://github.com/craigpj/Laravel-Vue-Products-App/blob/main/resources/js/appAdmin.js).
- Public Products component [Prodcts.vue](https://github.com/craigpj/Laravel-Vue-Products-App/blob/main/resources/js/components/Products.vue).
- Public app.js [app.js](https://github.com/craigpj/Laravel-Vue-Products-App/blob/main/resources/js/app.js).

### Backend (PHP)

- API routes: [api.php](https://github.com/craigpj/Laravel-Vue-Products-App/blob/main/routes/api.php).
- Main API response controller: [ProductController.php](https://github.com/craigpj/Laravel-Vue-Products-App/blob/main/app/Http/Controllers/ProductController.php).

## Database

- Products table migration file [create_products_table.php](https://github.com/craigpj/Laravel-Vue-Products-App/blob/main/database/migrations/2020_10_09_043647_create_products_table.php)
- Database Seeder [DatabaseSeeder.php](https://github.com/craigpj/Laravel-Vue-Products-App/blob/main/database/seeders/DatabaseSeeder.php).
- Other create table migration files: [migrations](https://github.com/craigpj/Laravel-Vue-Products-App/tree/main/database/migrations).

### Tables
This application consists of 4 custom tables and 3 Laravel generated tables:
Custom:
- products
- images
- statuses
- emails

Laravel
- failed_jobs
- migrations
- users

## Author

Craig Johnson: craigpj#gmail.com

## License

[MIT license](https://opensource.org/licenses/MIT).
