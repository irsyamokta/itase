
# ITASE

ITASE (Information Technology Art Sport and E-Sport) adalah sebuah web yang dirancang untuk mendukung pengelolaan event ITASE, kompetisi tahunan yang diadakan oleh program Studi Sistem Informasi dalam rangka Dies Natalis program studi. Web ini menyediakan berbagai fitur untuk menyelenggarakan kompetisi, mulai dari pendaftaran peserta, pengelolaan lomba, hingga penilaian karya.

Web ITASE diharapkan dapat memberikan pengalaman yang lebih baik dalam mengelola dan menyelenggarakan kompetisi akademik ini, serta mempermudah peserta dan panitia dalam berinteraksi dan melakukan aktivitas seputar lomba.

## Features

- **Multirole autentikasi**: Memiliki peran sebagai Peserta dan Panitia dengan hak akses yang berbeda.
- **Pendaftaran Lomba**: Peserta dapat mendaftar untuk lomba yang tersedia.
- **Pembayaran Lomba**: Integrasi dengan Midtrans Payment untuk mempermudah pembayaran lomba.
- **Manajemen Event**: Memudahkan panitia dalam mengelola berbagai aspek lomba.
- **Responsive**: Tampilan web yang optimal di berbagai perangkat.


## Tech Stack

- **Backend**: Laravel
- **Frontend**: Tempalating Blade Engine, TailwindCSS for Styling
- **Database**: MySQL
- **Others**: Javascript


## Demo Project

Web saat ini masih dalam pengembangan (local)


## Preview

![App Screenshot](https://github.com/irsyamokta/assets/blob/72d0ba60390ab6ff5131d320a6d9516eeefa515f/itase/1.png)

![App Screenshot](https://github.com/irsyamokta/assets/blob/72d0ba60390ab6ff5131d320a6d9516eeefa515f/itase/2.png)

![App Screenshot](https://github.com/irsyamokta/assets/blob/72d0ba60390ab6ff5131d320a6d9516eeefa515f/itase/3.png)

![App Screenshot](https://github.com/irsyamokta/assets/blob/72d0ba60390ab6ff5131d320a6d9516eeefa515f/itase/8.png)

![App Screenshot](https://github.com/irsyamokta/assets/blob/72d0ba60390ab6ff5131d320a6d9516eeefa515f/itase/10.png)

![App Screenshot](https://github.com/irsyamokta/assets/blob/72d0ba60390ab6ff5131d320a6d9516eeefa515f/itase/11.png)

![App Screenshot](https://github.com/irsyamokta/assets/blob/72d0ba60390ab6ff5131d320a6d9516eeefa515f/itase/12.png)

![App Screenshot](https://github.com/irsyamokta/assets/blob/72d0ba60390ab6ff5131d320a6d9516eeefa515f/itase/13.png)

## Panduan Instalasi
Ikuti langkah-langkah berikut untuk menginstal ITASE di lokal Anda:
<br>Nb. Pastikan lokal server Anda sudah berjalan, bisa menggunakan XAMPP, Laragon, atau sejenisnya.

1. **Clone Repository**
   ```bash
   git clone https://github.com/irsyamokta/itase.git
   
2. **Masuk ke Direktori Proyek Setelah repositori ter-clone**
   ```bash
   cd itase
    
3. **Install Dependencies Pastikan Anda sudah menginstal Composer dan Node.js**
   ```bash
   composer install
   npm install
   
4. **Konfigurasi .env**
   ```bash
   cp .env.example .env
   
5. **Generate Key Aplikasi**
   ```bash
   php artisan key:generate
   
6. **Migrasi Database**
   Karena adanya foreign key, jalankan perintah migrasi berikut secara berurutan untuk memastikan migrasi berhasil:
   ```bash
   php artisan migrate --path=database/migrations/0001_01_01_000000_create_users_table.php
   php artisan migrate --path=database/migrations/2024_12_24_121339_create_events_table.php
   php artisan migrate --path=database/migrations/2024_12_24_121328_create_orders_table.php
   php artisan migrate --path=database/migrations/2024_12_24_121409_create_tims_table.php
   php artisan migrate --path=database/migrations/2024_12_24_121402_create_participants_table.php
   php artisan migrate --path=database/migrations/2024_12_29_035910_create_submissions_table.php
   php artisan migrate
   
7. **Install NPM Assets**
   ```bash
   npm run dev
   
8. **Jalankan Server**
   ```bash
   php artisan serve

9. Akses aplikasi melalui browser di alamat http://localhost:8000.

## Issue
Jika Anda menemui masalah atau membutuhkan bantuan lebih lanjut, silakan buka issue di GitHub atau hubungi saya.

## Authors

- [@irsyamokta](https://github.com/irsyamokta)
