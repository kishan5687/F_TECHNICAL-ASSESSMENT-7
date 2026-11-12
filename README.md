# Laravel Student Lab

A Laravel web application for managing customer records and user accounts. This project was developed for the IT0049 Web System Technologies activity using Laravel, PHP, and MySQL.

## Project Information

- **Framework:** Laravel 12
- **PHP:** 8.2
- **Database:** MySQL
- **Local development environment:** XAMPP
- **Frontend:** Laravel Blade, HTML, and CSS

## Features

### Customer Accounts
- View the customer list.
- Add a customer with a full name and valid email address.
- Edit existing customer records.
- Validate required fields before saving.

### User Accounts
- View registered user profiles.
- Create a user with a username, email address, and full name.
- Require a unique username and email address.
- Edit a user's username and full name.
- Upload or replace a profile picture.
- Validate uploaded images with a maximum file size of 2 MB.
- Display the uploaded avatar on the User Accounts page, with a letter placeholder when no avatar is available.


## Requirements

Install or prepare the following:

- PHP 8.2 or a compatible version supported by the installed Laravel release
- Composer
- MySQL
- XAMPP (or another local PHP/MySQL environment)
- A web browser

## Installation and Setup

### 1. Clone or copy the project

Place the project in your development folder. For example:

```bash
cd C:\Users\kisha\Documents
```


If you already have the project folder, open that folder in VS Code.

### 2. Install PHP dependencies

Open a terminal in the project directory and run:

```bash
composer install
```

### 3. Configure the environment file

Make a copy of `.env.example` and name the copy `.env` if the project does not already have an `.env` file.

Update the database and session settings in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_student_lab
DB_USERNAME=root
DB_PASSWORD=

SESSION_DRIVER=file
```

Use the database username and password configured on your own computer. The example above assumes a local XAMPP MySQL installation using the `root` account with a blank password.

Do not upload your real `.env` file or database passwords to a public GitHub repository.

### 4. Create the MySQL database

1. Start **Apache** and **MySQL** in the XAMPP Control Panel.
2. Open phpMyAdmin at `http://localhost/phpmyadmin`.
3. Create a database named:

```text
laravel_student_lab
```

4. Make sure the database name in `.env` matches the database you created.

### 5. Generate the application key

Run:

```bash
php artisan key:generate
```

If the project already has a valid application key, this command is normally not needed again.

### 6. Clear cached configuration

Run:

```bash
php artisan optimize:clear
```

### 7. Run database migrations

Run:

```bash
php artisan migrate
```

This creates the database tables from the migration files, including the users, customers, tasks, and Laravel support tables.

To check the migration status, run:

```bash
php artisan migrate:status
```

**Important:** `php artisan migrate:fresh` drops all existing tables before recreating them. Do not use it if you need to keep existing database records.

### 8. Create the public storage link

Run:

```bash
php artisan storage:link
```

This allows uploaded avatar images stored on Laravel's public disk to be displayed by the application. If Laravel reports that the link already exists, you do not need to create it again.

### 9. Start the development server

Run:

```bash
php artisan serve
```

Open the application at:

```text
http://127.0.0.1:8000
```

## Main Application Pages

With the development server running, use these routes:

| Page | URL |
|---|---|
| Customer Accounts | `http://127.0.0.1:8000/customers` |
| Create Customer | `http://127.0.0.1:8000/customers/create` |
| User Accounts | `http://127.0.0.1:8000/users` |
| Create User | `http://127.0.0.1:8000/users/create` |

## Project Structure

Relevant project files and folders:

```text
LaravelStudentLab/
├── app/
│   ├── Http/
│   │   └── Controllers/
│   │       ├── CustomerController.php
│   │       └── UserController.php
│   └── Models/
│       ├── Customer.php
│       └── User.php
├── database/
│   └── migrations/
├── public/
├── resources/
│   └── views/
│       ├── customers/
│       └── users/
├── routes/
│   └── web.php
├── storage/
├── .env
└── README.md
```

## Avatar Upload Details

- The Create User form includes a profile picture file input.
- The Edit User form can be used to replace an existing profile picture.
- Uploaded files are stored on Laravel's `public` disk in the `avatars` directory.
- The database stores the image path in the `avatar` column, not the image itself.
- The current validation accepts image files up to 2 MB.
- The public storage link is required for browser access to uploaded images.

## Troubleshooting

### Laravel cannot connect to MySQL

1. Make sure MySQL is running in XAMPP.
2. Check `DB_CONNECTION`, `DB_HOST`, `DB_PORT`, `DB_DATABASE`, `DB_USERNAME`, and `DB_PASSWORD` in `.env`.
3. Run:

```bash
php artisan optimize:clear
```

4. Try the migration command again:

```bash
php artisan migrate
```

### A table does not exist

Check the migration status:

```bash
php artisan migrate:status
```

If the required migration is pending, run:

```bash
php artisan migrate
```

### Uploaded avatars do not display

Run:

```bash
php artisan storage:link
```

Then check that the uploaded file exists under:

```text
storage/app/public/avatars
```

Also confirm that the database `avatar` field contains the stored relative path.

### Session table does not exist

The project configuration uses file-based sessions:

```env
SESSION_DRIVER=file
```

After changing `.env`, run:

```bash
php artisan optimize:clear
```

## Database Backup for Submission

You can export the MySQL database through phpMyAdmin:

1. Open `http://localhost/phpmyadmin`.
2. Select `laravel_student_lab`.
3. Choose **Export**.
4. Select **Quick** and **SQL**.
5. Click **Export** to download the `.sql` file.

Include the SQL export in your submission if required by your instructor. Alternatively, include the migration files and any required seeders.


