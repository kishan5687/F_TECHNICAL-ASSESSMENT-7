# Laravel Student Lab -- TFA7

## Making It Editable in Laravel

A Laravel-based student lab project that extends the previous
POS/user-management activity. It includes Customer Accounts and User
Accounts with create, edit, validation, and profile-image upload
functionality.

## Project Information

-   **Framework:** Laravel 12
-   **PHP:** 8.2.12
-   **Database:** SQLite
-   **Frontend:** Laravel Blade, HTML, and CSS
-   **Local development environment:** XAMPP and PHP Artisan development
    server

## Features

### Customer Accounts

-   View the customer list.
-   Create a customer using a full name and email address.
-   Validate required fields and email format.
-   Edit existing customer information.
-   Display validation errors and success messages.

### User Accounts

-   View the user list.
-   Create a user with a username, email address, and full name.
-   Validate required fields and unique usernames and email addresses.
-   Edit a user's username and full name.
-   Upload a profile image with a maximum file size of 2 MB.
-   Store uploaded avatar files on Laravel's public storage disk.
-   Display the avatar in the user listing.
-   Display an initial-based placeholder when no avatar is available.

### Interface

-   Customer and User pages use a matching neutral
    glassmorphism-inspired design.
-   The layout uses responsive styling, muted beige and gray colors,
    translucent cards, and simple navigation.

## Requirements

Install the following before running the project:

-   PHP 8.2 or later
-   Composer
-   SQLite support enabled in PHP
-   A web browser
-   Node.js is not required for the current pages because their styling
    is written directly in the Blade files.

## Installation and Setup

### 1. Open the project folder

Open the project folder in Visual Studio Code or a terminal.

### 2. Install PHP dependencies

Run:

``` bash
composer install
```

### 3. Configure the environment

If `.env` does not exist, copy `.env.example` and name the copy `.env`.

For Windows Command Prompt:

``` cmd
copy .env.example .env
```

For PowerShell:

``` powershell
Copy-Item .env.example .env
```

Generate the application key:

``` bash
php artisan key:generate
```

### 4. Configure SQLite

The project uses SQLite. Confirm that this setting is present in `.env`:

``` env
DB_CONNECTION=sqlite
```

The database file should be located at:

``` text
database/database.sqlite
```

If the file does not exist, create an empty file named `database.sqlite`
in the `database` folder before migrating.

### 5. Run database migrations

Run:

``` bash
php artisan migrate
```

This applies the project's migrations to the SQLite database.

**Important:** Do not use `php artisan migrate:fresh` on a database
containing records you want to keep. That command drops existing tables
and data before recreating them.

### 6. Create the public storage link

Run:

``` bash
php artisan storage:link
```

This allows uploaded files stored on Laravel's public disk to be
displayed through the `public/storage` path.

### 7. Start the development server

Run:

``` bash
php artisan serve
```

Open the local application in a browser:

``` text
http://127.0.0.1:8000/customers
```

## Main Routes

  Method   Route                    Purpose
  -------- ------------------------ ----------------------------------
  GET      `/customers`             Display Customer Accounts
  GET      `/customers/create`      Display the Create Customer form
  POST     `/customers`             Save a new customer
  GET      `/customers/{id}/edit`   Display the Edit Customer form
  PUT      `/customers/{id}`        Update a customer
  GET      `/users`                 Display User Accounts
  GET      `/users/create`          Display the Create User form
  POST     `/users`                 Save a new user
  GET      `/users/{id}/edit`       Display the Edit User form
  PUT      `/users/{id}`            Update a user

To view the registered Laravel routes, run:

``` bash
php artisan route:list
```

## User Account Notes

The existing Laravel `users` table requires the `name`, `email`, and
`password` fields. The user creation controller therefore:

-   Copies the submitted `full_name` value into the existing `name`
    column.
-   Validates the email address and checks that it is unique.
-   Generates a random 16-character password because the current Create
    User form does not ask the user to enter one.
-   Relies on the `User` model's `hashed` password cast to hash the
    generated password before saving it.

The generated password is not displayed. This is sufficient for the
current account-creation database requirement, but a password assignment
or reset process is needed before the account can be used to log in.

## Avatar Upload Notes

The Edit User form accepts image uploads up to 2 MB. The controller
stores the uploaded image under the `avatars` directory on Laravel's
`public` storage disk and saves the file path in the `avatar` database
column.

The User Accounts listing displays the stored avatar or an initial-based
placeholder when no avatar exists.

**Activity requirement to verify:** The current upload implementation
stores the original uploaded image. If the instructor requires an
image-processing package to create a prepared display-ready copy or
thumbnail, that processing step still needs to be implemented and
tested. Do not describe the thumbnail requirement as completed until it
has been added.

## Validation

The application uses Laravel request validation.

-   Customer full name: required.
-   Customer email: required and must be a valid email address.
-   User username: required and unique.
-   User full name: required.
-   User email: required, valid, and unique.
-   User avatar: optional image file, maximum 2 MB.

Validation messages are displayed beside the relevant form fields.

## Troubleshooting

### Composer is not recognized

Make sure Composer is installed and added to the Windows PATH. Restart
the terminal after installation.

### SQLite database connection error

Confirm that `.env` contains `DB_CONNECTION=sqlite` and that
`database/database.sqlite` exists.

### Uploaded avatars do not display

Run:

``` bash
php artisan storage:link
```

Also confirm that the uploaded file exists under
`storage/app/public/avatars`.

### Changes do not appear

Clear Laravel's cached configuration and views:

``` bash
php artisan optimize:clear
```

Refresh the browser.



## Author

QUEJADA, RAINA KISHAN S.
