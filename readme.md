## CustomerBook

> This API provides resources to create, read, update and delete customers from a database.

### Endpoints
The endpoints, sample requests and sample responses have been provided on [this Postman documentation](https://documenter.getpostman.com/view/5520362/SW7c3TCC).

### Dependencies
- [PHP](https://php.net) (^7.1.3)
- [Composer](https://getcomposer.org)
### Setup
Clone repository
```bash
git clone https://github.com/iamwebwiz/customerbook-backend.git; cd customerbook-backend;
```
Install dependencies
```bash
composer install
```
Copy `.env.example` to `.env`
```bash
cp .env.example .env
```
Generate app key
```bash
php artisan key:generate
```
Create a database and fill in the credentials in `.env`
```bash
DB_DATABASE=[yourDbName]
DB_USERNAME=root
DB_PASSWORD=
DB_HOST=localhost
DB_PORT=3306
```
Run migrations and seed the database for test data
```bash
php artisan migrate --seed
```

🎉🎉🎉
