# Laratrust

### how to install laratrust = 
Documentation = http://laratrust.readthedocs.io/en/5.0/installation.html

1. install melalui composer
`composer require santigarcor/laratrust`

2. jika kamu menggunakan laravel 5.5 kebawah 
    - tambahkan di dalam `config/app.php` tepatnya di bagian array `providers`nya : 
        ```php
        Laratrust\LaratrustServiceProvider::class,
        ```
    - di file yang sama tambahkan di bagian array `aliases` nya :
        ```php
        'Laratrust'   => Laratrust\LaratrustFacade::class,
        ```

3. publish all configuration `php artisan vendor:publish --tag="laratrust"`

### How to make seeder = 

`php artisan make:seeder 'NamaSeeder'`