<a name="readme-top"></a>

<!-- PROJECT LOGO -->
<br />
<div align="center">
<img src="https://raw.githubusercontent.com/adearya/HostingImages/main/Images/Logos/logo_dbo.svg" alt="Logo" width="80" height="80">

<h3 align="center">Digital Blue Ocean</h3>
  <p align="center">
  Digital Blue Ocean adalah sebuah situs web perpustakaan digital yang didukung oleh teknologi Laravel sebagai backend, sebuah framework PHP modern untuk pengembangan web lalu menggunakan database management system MariaDB dan menggunakan Bootstrap sebagai frontend. Dengan pendekatan arsitektur monolitik, situs ini menyatukan semua komponen utamanya ke dalam satu aplikasi besar, menciptakan lingkungan pengembangan yang terintegrasi dan terpusat.
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
  <a href="<link>">
    <img src="<badge>" alt="" />
  </a>
</div>

## Getting Started

description

### Prerequisites

<div>
  <a href="https://laravel.com">
    <img src="https://img.shields.io/badge/Laravel-FF2D20?style=for-the-badge&logo=laravel&logoColor=white" alt="" />
  </a>
  <a href="https://getbootstrap.com">
    <img src="https://img.shields.io/badge/Bootstrap-563D7C?style=for-the-badge&logo=bootstrap&logoColor=white" alt="" />
  </a>
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
   cp .env_example .env
  ```
5. Generate Key
  ```sh
   php artisan key:generate
  ```
6. Sesuaikan file .env pada bagian
   DB_DATABASE=yout_database_name
   DB_USERNAME=your_user
   DB_PASSWORD=your_password
7. Migrate dan Seed
  ```sh
   php artisan migrate:fresh --seed
  ```

## Usage
1. Run server
  ```sh
   php artisan serve
  ```
2. Load ip address pada browser
   http://127.0.0.1:8000

3. Enjoy with Admin
   Email     : admindbo@gmail.com
   Password  : 01101001
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
