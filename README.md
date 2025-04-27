# brickHub
laravel & livewire & filament project for the dev final exam
# BrickHub Project

This repository contains the BrickHub web application built with Laravel, Livewire, and Filament.

## Prerequisites

Before installation, make sure you have the following software installed on your system:

- [Git](https://git-scm.com/downloads)
- [PHP](https://www.php.net/downloads) (8.1 or higher recommended)
- [Composer](https://getcomposer.org/download/)
- [MySQL](https://dev.mysql.com/downloads/mysql/) server

## Installation Steps

### 1. Enable Required PHP Extensions

Open your `php.ini` configuration file with a text editor and find these lines:

```
;extension=zip
;extension=intl
```

Remove the semicolons at the beginning of these lines to enable the extensions:

```
extension=zip
extension=intl
```

Save the file and restart your web server (Apache, Nginx, etc.) for the changes to take effect.

### 2. Clone the Repository

Clone the project repository from GitHub by running the following command in your terminal:

```bash
git clone https://github.com/D4V1D-101/Bh.git
```

### 3. Navigate to Project Directory

Change to the project directory:

```bash
cd Bh
```

### 4. Install Dependencies

Install the project dependencies using Composer:

```bash
composer install
```

### 5. Configure Environment

Copy the example environment file if it doesn't here:

```bash
cp .env.example .env
```

Edit the `.env` file and configure your database connection:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=brickhub
DB_USERNAME=root
DB_PASSWORD=
```

### 6. Generate Application Key

Generate an application key for encryption purposes:

```bash
php artisan key:generate
```

### 7. Create and Set Up Database

Create a database named `brickhub` in your MySQL server and insert the `brickhub_setup.sql` or

### 7. Run Migrations

Run the database migrations:

```bash
php artisan migrate
```

### 8. Import Sample Data

Import the sample data from the `brickhub_data.sql` file located in the project's root directory into your `brickhub` database. You can use a tool like phpMyAdmin or the MySQL command line:

### 9. Start the Development Server

Start the Laravel development server:

```bash
php artisan serve
```

The application will be available at `http://localhost:8000`

## Default User Accounts

After importing the sample data, you can use the following accounts to login:

- **Admin User**:
  - Email: admin@gmail.com
  - Password: admin
