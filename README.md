# pp1806
Laravel example project

### 1.Clone laravel source code and run server
    composer create-project --prefer-dist laravel/laravel blog
    php artisan serve
    // you can test at http://localhost:8000
### 2.Make authticate
    php artisan migrate
    php artisan make:auth
    // you need restart server before test
