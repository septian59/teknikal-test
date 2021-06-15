<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

### Sebuah Hasil Aplikasi teknikal Test

### Fitur
- Admin CRUD City
- Admin CRUD Team
- Admin CRUD Pemain (belum selesai)
- Admin Crud Data Pertandingan (belum selesai)
- Soft Delete

--------------

## Default Account Testing
**Writer Account**
- Email: septian@gmail.com
- Password: password

--------------

### File Screenshot
**public/asset/screenshoot-projek**

--------------

## Install
1. **Clone Repository**
```bash
git clone https://github.com/septian59/teknikal-test.git
cd teknikal-test
composer install
```
2. **Rename dan Coppy ``.env.example`` ke ``.env``

3. **Jalankan perintah**
```bash
php artisan key:generate
```

4. **Edit dan tambahkan di baris ``.env``**
```
DB_PORT=3306
DB_DATABASE=<YOUR DATABASE NAME>
DB_USERNAME=<YOUR DATABASE USERNAME>
DB_PASSWORD=<YOUR DATABASE PASSWORD>

FILESYSTEM_DRIVER=public //tambahkan baris ini
```
5. **Migrate database dan seed**
```bash
php artisan migrate:fresh --seed
```

6. **Jalankan Website**
``` bash
php artisan serve
```
    
## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
