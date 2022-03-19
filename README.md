<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>


## About App

Sistem Informasi Penjualan di Toko Bangunan


## Roadmap 💎
| Menu                                                                       | Status                                                                                                            |
| ----------------------------------------------------------------------------------------- | -------------------------------------------------------------------------------------------------------------------------------- |
| Auth Multi User                                                                     | :white_check_mark:                                                                                                  |
| Admin : Pengelolaan Stok                                                                       | :clock1030:                                                                                                               |
| Admin : Pengelolaan Penjualan                                                                       | :clock1030:                                                                                                               |
| Admin : Pengelolaan Pembayaran                                                                       | :clock1030:                                                                                                               |
| Admin : Pengelolaan Pembelian                                                                       | :clock1030:                                                                                                               |
| Admin : Pengelolaan Pembelian                                                                       | :clock1030:                                                                                                               |
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).


This section should list any major frameworks that you built your project using. Leave any add-ons/plugins for the acknowledgements section. Here are a few examples.
<!-- * [Bootstrap](https://getbootstrap.com) -->
<!-- * [JQuery](https://jquery.com) -->
Tools and Framework
* [Laravel 8](https://laravel.com)
* [PHP 7.4+](https://php.net)
* [gitbash](https://git-scm.com/downloads)
* [composer](https://getcomposer.org/)


Alternatif (tidak perlu diinstall)
<!-- * [docker](https://www.docker.com/) -->
* [Nodejs](https://node.js)

Library/Plugin
* [Auth:Fortify](#)
* [Auth:Jetstream](#)
* [Bootstrap 4](https://getbootstrap.com/docs/4.0/getting-started/introduction/)
* [Stisla](https://github.com/stisla/stisla)


<!-- Fitur Utama
* [Menejemen Data Produk dan Treatment](#)
* [Menejemen Dokter](#)
* [Menejemen Member dan Penjadwalan Perawatan](#)
* [Pengingat SMS gateway](#) -->


<!-- Docker
* [mysql dan settings database](#)
* [phpmyadmin](#) -->


<!-- GETTING STARTED -->
## Getting Started

Siapkan terlebih dahulu peralatan perangnya.

<!-- ### Prerequisites

This is an example of how to list things you need to use the software and how to install them.
* npm
  ```sh
  npm install npm@latest -g
  ``` -->

### Installation

<!-- 1. Get a free API Key at [https://example.com](https://example.com) -->
1. Clone the repo
   ```sh
   git clone https://github.com/godgodwinter/s_penjualan.git
   ```
2. Install menggunakan composer
   ```sh
   composer install
   ```
3. Buat file .env atau copy dan edit file .env_copy kemudian sesuaikan dengan database anda
   ```sh
   cp .env_example .env 
   ```
   Gunakan editor kesukaan anda. Jika mengedit menggunakan nano lakukan langkah berikut:

   ```sh
   nano .env //ubah database user dan password database di perangkat anda
   ```

4. jalankan server Laravel
   ```sh
   php artisan serve
   ```
5. lakukan migrasi database
   ```sh
   php artisan migrate
   ```
   atau migrate:fresh jika ingin dari data kosong
   ```sh
   php artisan migrate:fresh
   ```
6. Jika ingin menggunakan data palsu untuk testing lanjutkan langkah 6 ini
   ```sh
   php artisan db:seed   //untuk meload data user admin pass admin
   ```
   

   

Buka browser dan tulis alamat berikut
   
   ```sh
   http://127.0.0.1:8000/
   ```



<!-- CONTACT -->
## Contact

Kukuh Setya Nugraha - [@kakadlz](https://twitter.com/kakadlz) 
Kukuh Setya Nugraha - [@kukuh.sn](https://www.instagram.com/kukuh.sn/) 

Project Link: [https://github.com/godgodwinter/s_penjualan](https://github.com/godgodwinter/s_penjualan)


