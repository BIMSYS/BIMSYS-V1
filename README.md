# SOP

1. Sebelum mengerjakan issue, silahkan create branch dahulu.
2. Lakukan Pull Request jika fitur sudah selesai dikerjakan.
3. Akan di merge jika lolos review
4. Jika tidak lolos, maka akan di reject dan harus diperbaiki sesuai review.


# Start Dev in your local computer

Clone Project Repo
copy file `.env.example` menjadi `.env`
set konfigurasi environment pada file .env

## Konfig file .env
- APP_NAME="BIMSYS Pelajar Juara"
- MAIL_HOST=smtp.gmail.com
- MAIL_PORT=587
- MAIL_USERNAME=bimsysjuara@gmail.com
- MAIL_PASSWORD=bimsys123
- MAIL_ENCRYPTION=tls
- MAIL_FROM_ADDRESS="noreply@bimsys.com"

## konfig setelah clone di terminal
1. run composer install
2. run php artisan key:generate
3. composer require laravel/ui

### Untuk menjalankan laravel
* php artisan serve

### Untuk migration database
* php artisan migrate
