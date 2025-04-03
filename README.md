<a name="readme-top"></a>

<!-- digital-blue-ocean -->
<br />

<div align="center">

<img src="https://raw.githubusercontent.com/adearya/digital-blue-ocean/HEAD/raw/images/github_user_logo.jpeg" alt="Github User Logo" width="80" height="80">

<h3 align="center">Digital Blue Ocean</h3>
    <p align="center">
        I created this project to facilitate structured and accessible academic documentation, allowing researchers and students to manage and retrieve research materials efficiently.
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


## About The Project

![App Screenshot](https://raw.githubusercontent.com/adearya/digital-blue-ocean/HEAD/raw/images/desktop_screenshot.png)

<p align="center">
    This project leverages Laravel for backend management, Bootstrap for responsive UI design, and MariaDB for efficient data storage. It enables users to upload, categorize, and search for academic content easily while maintaining a clean and user-friendly interface.
</p>

### Built With
![Laravel](https://img.shields.io/badge/Laravel-%23FF2D20.svg?logo=laravel&logoColor=white) <br />
![Bootstrap](https://img.shields.io/badge/Bootstrap-7952B3?logo=bootstrap&logoColor=fff) <br />
![MariaDB](https://img.shields.io/badge/MariaDB-003545?logo=mariadb&logoColor=white) <br />
<!-- add_built_with -->


## Getting Started

<p>
    Users can explore academic resources through a categorized system, perform advanced searches, and manage their documentation with a streamlined interface. The platform is designed to be expandable, allowing integration with additional features as needed.
</p>

### Prerequisites
<p>Before getting started, ensure that your system meets all the necessary requirements to run this project smoothly. Below is a list of prerequisites that need to be installed.</p>

<ul>
	<li>laravel >= 10.29.0</li>
	<li>bootstrap >= 5.3.2</li>
	<li>mariadb >= 11.6.2</li>
    <!-- add_prerequisites -->
</ul>

### Installation
<p>Follow these steps to install and configure the project on your system. The installation process is designed to be straightforward for both beginners and experienced users.</p>

Clone the repo
```sh
git clone https://github.com/adearya/digital-blue-ocean.git
```
Change directory
```sh
cd digital-blue-ocean/
```
To install packages
```sh
composer install
```
Copy file env
```sh
cp .env.example .env
```
Generate Key
```sh
php artisan key:generate
```
Fill in the database env var according to your database
```sh
DB_DATABASE=<database_name>, DB_USERNAME=<user>, DB_PASSWORD=<password>
```
Migrate and Seed
```sh
php artisan migrate:fresh --seed
```
Storage Link
```sh
php artisan storage:link
```
<!-- add_installation -->


## Usage

<p>Once the installation is complete, refer to this section for basic usage instructions. Make sure all prerequisites are met before running the application.</p>


To run this project
```sh
php artisan serve
```
Open a browser to see the output
```sh
http://localhost:8000
```
Enjoy with admin
```sh
Email: admindbo@gmail.com, Password: 01101001
```
<!-- add_usage -->


## Contact

<p>If you have any questions, encounter any issues, or would like to contribute to this project, feel free to reach out through the contact information below</p>

<div>
    <a href="https://linkedin.com/in/ade-arya-bimantara">
        <img src="https://img.shields.io/badge/linkedin-%230077B5.svg?style=for-the-badge&logo=linkedin&logoColor=white">
    </a>
</div>
<div>
    <a href="mailto:ade.aryabimantara@gmail.com">
        <img src="https://img.shields.io/badge/Gmail-D14836?style=for-the-badge&logo=gmail&logoColor=white" alt="Gmail" />
    </a>
</div>
<div>
    <a href="https://www.instagram.com/adearyabmtra">
        <img src="https://img.shields.io/badge/Instagram-%23E4405F.svg?style=for-the-badge&logo=Instagram&logoColor=white" alt="Instagram" />
    </a>
</div>
<div>
    <a href="https://t.me/adearyabimantara">
        <img src="https://img.shields.io/badge/Telegram-2CA5E0?style=for-the-badge&logo=telegram&logoColor=white">
    </a>
</div>

<br />
<br />

<p align="center">Thanks for checking out this Trash Project XD</p>

<br />

<p align="center">(<a href="#readme-top">back to top</a>)</p>
