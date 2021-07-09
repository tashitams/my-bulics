## About My BuliCS
My BuliCS is a tailored made School Management System for Buli Central School, Zhemgang built on some of the hottest opensource technologies such as Laravel (a PHP framework) and Vue.js as a Progressive Web Application.


## Installation

Clone the repo locally:

```sh
git clone https://github.com/tashitams/my-bulics.git
cd my-bulics
```

Install PHP dependencies:

```sh
composer install
```

Install NPM dependencies:

```sh
npm install
```

Build assets:
For development please run
```sh
npm run dev OR
npm run watch
```
For production please run
```sh
npm run prod
```

Setup configuration:
```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```

Create an empty database and update .env file
```sh
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=
DB_USERNAME=
DB_PASSWORD=
```

Run database migrations:
```sh
php artisan migrate:fresh --seed
```

Run the dev server (the output will give the address):
```sh
php artisan serve
```

How to log in as admin:
```sh
http://127.0.0.1:8000/admin/login
Username: admin
Password: admin@123
```

# Security Vulnerabilities
If you find any security vulnerabilities in this app, please don't disclose it publicly. Please email me at: mailto:codertashi@gmail.com.
