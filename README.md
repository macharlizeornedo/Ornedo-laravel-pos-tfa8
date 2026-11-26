# Laravel POS – TFA8

Customer and user record management using Laravel resource controllers and Laravel Breeze authentication.

## Features

- Login, registration, and logout using Laravel Breeze
- Protected customer and user management routes
- Create, view, edit, and delete customer records
- Create, view, edit, and delete user records
- Form validation and password hashing
- Avatar uploads and initial placeholders for missing images

## Requirements

- PHP 8.2 or newer with GD and MySQL extensions enabled
- Composer
- Node.js 22.12 or newer with npm
- MySQL or MariaDB
- XAMPP can be used for the local database

## Local Setup

### 1. Install PHP dependencies

Open a terminal inside the project folder:

```powershell
composer install
```

### 2. Configure the environment

For a new installation:

```powershell
Copy-Item .env.example .env
php artisan key:generate
```

Update the database settings in `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=ta2
DB_USERNAME=root
DB_PASSWORD=
```

Adjust the credentials to match your local database.

### 3. Import the database

1. Start MySQL and Apache in XAMPP.
2. Open http://localhost/phpmyadmin.
3. Create an empty database named `ta2`.
4. Select the database and open Import.
5. Import the included `ta2.sql` file.

The SQL export includes the tables required by the application.

### 4. Build the frontend assets

```powershell
npm.cmd install
npm.cmd run build
```

### 5. Link storage and start Laravel

```powershell
php artisan storage:link
php artisan config:clear
php artisan serve
```

Open http://127.0.0.1:8000/register to create a login account.

## Main Pages

| Page | URL |
|---|---|
| Register | /register |
| Login | /login |
| Dashboard | /dashboard |
| Customers | /customers |
| Users | /users |

Breeze login accounts are stored in the `users` table. Records managed through the Users page are stored separately in the `user` table.

## Manual Testing

1. While logged out, visit `/customers` and `/users`. Both should redirect to Login.
2. Register or log in, then confirm both pages are accessible.
3. Create a test customer with an avatar.
4. View, edit, and delete the test customer.
5. Repeat the CRUD checks for a test user.
6. When editing a user, leave the password blank to keep the existing password.
7. Log out and confirm the management pages require login again.

## Hosting

Hosting is not required for this activity, as instructed by the professor.