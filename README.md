<a name="readme-top"></a>

<!-- PROJECT LOGO -->
<br />
<div align="center">
  <img src="https://raw.githubusercontent.com/adearya/HostingImages/main/Images/Logos/logo_dbo.svg" alt="Logo" width="80" height="80">

  <h3 align="center">Digital Blue Ocean</h3>
  <p align="center">
  Digital Blue Ocean adalah sebuah situs web dokumentasi yang menghadirkan pengalaman penelitian yang luar biasa, fokus pada koleksi jurnal, tesis, dan berbagai sumber daya akademis. Dengan pendekatan inovatif, situs ini menyajikan lingkungan yang memudahkan akses dan penjelajahan terhadap beragam pengetahuan ilmiah. Desainnya yang efisien memungkinkan pengguna untuk dengan cepat menemukan dan mengakses jurnal-jurnal terbaru, tesis terkini, dan dokumen-dokumen penelitian penting lainnya. Sistem pencarian yang canggih memastikan bahwa pengguna dapat mengidentifikasi materi yang relevan dengan mudah, sementara fitur kategorisasi yang cerdas menyederhanakan navigasi dalam berbagai bidang studi. Dengan kemampuan untuk mengunduh dan berbagi dokumen, Digital Blue Ocean tidak hanya menjadi sumber daya intelektual yang kaya, tetapi juga platform kolaboratif yang mendukung pertukaran pengetahuan di antara komunitas peneliti dan akademisi. Ini adalah tempat yang menghadirkan akses terkini dan mudah ke pengetahuan akademis, mendorong pertumbuhan intelektual dan pembelajaran kolaboratif.
  </p>
</div>

<!-- TABLE OF CONTENTS -->
<details>
  <summary>Table of Contents</summary>
  <ol>
    <li>
      <a href="#about-the-project">About The Project</a>
      <ul>
        <li><a href="#built-with">Built With</a></li>
      </ul>
    </li>
    <li>
      <a href="#getting-started">Getting Started</a>
      <ul>
        <li><a href="#prerequisites">Prerequisites</a></li>
        <li><a href="#installation">Installation</a></li>
      </ul>
    </li>
    <li><a href="#usage">Usage</a></li>
    <li><a href="#contact">Contact</a></li>
  </ol>
</details>

<!-- ABOUT THE PROJECT -->
## About The Project

![App Screenshot](https://raw.githubusercontent.com/adearya/HostingImages/main/Images/Screenshots/ss_dbo.png)

### Built With

<div>
  <a href="https://www.php.net">
    <img src="https://img.shields.io/badge/PHP-777BB4?style=for-the-badge&logo=php&logoColor=white" alt="" />
  </a>
</div>

## Getting Started

Digital Blue Ocean dirancang dengan teknologi Laravel sebagai backend, sebuah framework PHP modern untuk pengembangan web lalu menggunakan database management system MariaDB dan menggunakan Bootstrap sebagai frontend. Dengan pendekatan arsitektur monolitik, situs ini menyatukan semua komponen utamanya ke dalam satu aplikasi besar, menciptakan lingkungan pengembangan yang terintegrasi dan terpusat.

### Prerequisites

<div>
  <a href="https://laravel.com">
    <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="" />
  </a><br>
  <a href="https://getbootstrap.com">
    <img src="https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white" alt="" />
  </a><br>
  <a href="https://mariadb.org">
    <img src="https://img.shields.io/badge/MariaDB-003545?style=for-the-badge&logo=mariadb&logoColor=white" alt="" />
  </a>
</div>

### Installation

1. Clone the repo
  ```sh
   git clone https://github.com/adearya/DigitalBlueOcean.git
  ```
2. Change directory
  ```sh
   cd DigitalBlueOcean/
  ```
3. Install packages
  ```sh
   composer install
  ```
4. Copy file env 
  ```sh
   cp .env.example .env
  ```
5. Generate Key
  ```sh
   php artisan key:generate
  ```
6. Sesuaikan file .env pada bagian<br>
   DB_DATABASE=yout_database_name<br>
   DB_USERNAME=your_user<br>
   DB_PASSWORD=your_password<br>

7. Migrate dan Seed
  ```sh
   php artisan migrate:fresh --seed
  ```
8. Storage Link
  ```sh
   php artisan storage:link
  ```
9. Run server
  ```sh
   php artisan serve
  ```

## Usage

1. Load ip address pada browser<br>
   http://127.0.0.1:8000

2. Enjoy with Admin<br>
   Email: admindbo@gmail.com<br>
   Password: 01101001<br>
   
## Contact

<div>
  <a href="https://www.instagram.com/adearyabmtra">
      <img src="https://img.shields.io/badge/Instagram-%23E4405F.svg?style=for-the-badge&logo=Instagram&logoColor=white" alt="Instagram" />
  </a>
</div>
<div>
  <a href="mailto:ade.aryabimantara@gmail.com">
    <img src="https://img.shields.io/badge/Gmail-D14836?style=for-the-badge&logo=gmail&logoColor=white" alt="Gmail" />
  </a>
</div>

<p align="center">(<a href="#readme-top">back to top</a>)</p>
