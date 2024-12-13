# MangaLo! 

<p align="center"><a href="https://laravel.com" target="_blank"><img src="!Rancangan Website!/logo/manga.png" width="400" alt="Laravel Logo"></a></p>
<p align="center"><a href="https://laravel.com" target="_blank"><img src="!Rancangan Website!/logo/MangaLo_logo_no_background-removebg-preview.png" width="200" alt="Laravel Logo"></a></p>

[![Build Status](https://github.com/laravel/framework/workflows/tests/badge.svg)](https://github.com/laravel/framework/actions)
[![Total Downloads](https://img.shields.io/packagist/dt/laravel/framework)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://img.shields.io/packagist/v/laravel/framework)](https://packagist.org/packages/laravel/framework)
[![License](https://img.shields.io/packagist/l/laravel/framework)](https://packagist.org/packages/laravel/framework)

## Tentang MangaLo!

**MangaLo!** adalah platform website untuk membaca komik dan manga secara online. Website ini dirancang untuk memberikan pengalaman membaca yang nyaman dan mudah bagi semua penggemar manga. MangaLo! menyediakan dua jenis manga:

- **Gratis**: Tersedia untuk semua pengguna tanpa biaya tambahan.
- **Berbayar**: Memerlukan poin yang bisa dibeli untuk membuka chapter tertentu.

Dengan antarmuka yang ramah pengguna dan koleksi manga yang terus diperbarui, MangaLo! menjadi pilihan terbaik untuk menikmati manga favorit Anda kapan saja dan di mana saja.

## Keunggulan MangaLo!

- **Aksesibilitas Mudah**: Tersedia online dengan antarmuka yang responsif di berbagai perangkat.
- **Koleksi Beragam**: Menyediakan berbagai genre dan cerita untuk semua selera.
- **Sistem Mikrotransaksi**: Pengguna dapat membeli poin untuk membuka chapter premium dengan mudah.
- **Manajemen Pengguna**: Mendukung tiga jenis pengguna: 
  - **Pengguna Umum**: Membaca manga dan blog.
  - **Staff**: Menambah, mengedit, atau menghapus manga dan blog.
  - **Admin**: Mengelola akun staff dan memantau konten.
- **Pembayaran Terintegrasi**: Didukung oleh gateway pembayaran Midtrans yang aman dan terpercaya.

## Instalasi Cepat

Ikuti langkah-langkah berikut untuk menjalankan MangaLo! di mesin lokal Anda:

1. **Clone Repository**:

    ```bash
    git clone https://github.com/mtaufik31/MangaLo.git
    cd mangalo
    ```

2. **Instal Dependensi**:

    ```bash
    composer install
    npm install
    npm run build
    ```

3. **Konfigurasi File `.env`**:

    Salin file `.env.example` ke `.env` dan sesuaikan konfigurasi berikut:

    ```bash
    cp .env.example .env
    ```

    Edit file `.env` untuk menyesuaikan dengan database lokal Anda:

    ```env
    DB_DATABASE=mangalo
    DB_USERNAME=root
    DB_PASSWORD=yourpassword

    MIDTRANS_SERVER_KEY=your-midtrans-server-key
    MIDTRANS_CLIENT_KEY=your-midtrans-client-key
    MIDTRANS_IS_PRODUCTION=false
    ```

4. **Generate Application Key**:

    ```bash
    php artisan key:generate
    ```

5. **Migrasi dan Seeder**:

    ```bash
    php artisan migrate --seed
    ```

6. **Jalankan Server Lokal**:

    ```bash
    php artisan serve
    ```

    Buka browser dan akses aplikasi di `http://localhost:8000`.

## Pembimbing

[Khairul Amri CM](https://github.com/piramli14)

## Lisensi

MangaLo! dikembangkan menggunakan framework Laravel yang merupakan perangkat lunak sumber terbuka yang dilisensikan di bawah [MIT license](https://opensource.org/licenses/MIT).
