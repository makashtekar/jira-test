# Task Management System (JIRA)

## Tech

- **Laravel** v10.20.0 - PHP Framework!
- **MySQL** v8.0.33 - Database
- **Blade** - Template Engine.
- **Tailwind CSS** - CSS
- **Alpine JS** - Lightweight JS
- **Breeze** - Authentication System

## Installation

1. Install the dependencies and devDependencies

```sh
git clone  Dropbox | [plugins/dropbox/README.md][PlDb]
cd jira-test
composer install
```

2. Update environment file .env


```sh
DB_CONNECTION=mysql
DB_HOST=YOUR_DB_HOST
DB_PORT=YOUR_DB_PORT
DB_DATABASE=YOUR_DB_NAME
DB_USERNAME=YOUR_DB_USERNAME
DB_PASSWORD=YOUR_DB_PASSWORD

```

3. Build with vite

```sh
npm run build
```

4. Launch Application

For Development

```sh
php artisan serve
```

