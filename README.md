## SPK Pemilihan Lokasi menggunakan metode MFEP

# 1) Setup Project
- copy .env.example => .env
- create database
- edit .env => set DB_DATABASE, DB_USERNAME, DB_PASSWORD

# 2) Install Dependency
```console
$ composer install
$ npm install
```

# 3) Database Migration
```console
$ php artisan key:generate
$ php artisan migrate
$ php artisan db:seed
```

# 4) Start Server
```console
$ php artisan serve
```

# 5) Sign In 
```console
email: admin@gmail.com
password: admin123
```