# Online Test Asia Ecommerce

Aplikasi sederhana dengan Laravel dan MySQL serta dokumentasi API yang dapat diakses pada link di bawah. Penerapan JWT Auth, Resource Output serta Middleware untuk penerapan multi user (Admin, User, Guest) pada 3 data source (Users, Posts, Comments).

## Installation

### 1. Composer
```
composer install
```

**if need update with JWT Dependency, do this**
```
composer update
```

### 2. Generate JWT Secret
```
php artisan jwt:secret
```

### 3. Generate APP_KEY
```
php artisan key:generate
```

### 4. Migrate and Seeder
```
php artisan migrate
```

```
php artisan db:seed
```

## API Documentation
https://documenter.getpostman.com/view/16500692/Uz5GobTj

## ERD
![ERD_Image](./ERD.png)



