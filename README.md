# Task managment mini application

live link: https://task-managment.evolvadigital.com

### Instruction for starting application
- Local
- Docker


## Local development

### System configuration and requirements

#### PHP 8.3+
    Extension:
    - curl
    - exif
    - fileinfo
    - gd
    - intl
    - mysqli
    - openssl
    - pdo_mysql
    - pdo_sqlite
    - xsl
    - zip
#### Mysql 8.0

#### Composer version 2.4.1 or newer

#### Nodejs version 18

### Commands


```bash
cp .env.example .env
```

open .env and configure database in case you are using mysql db instead of sqlite

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_managment
DB_USERNAME=root
DB_PASSWORD=
```
Fill this with your data

Install php dependencies
```bash
composer install
```
install nodejs dependencies
```bash
npm install
```
Generate app key
```bash
php artisan key:generate
```
Migrate database
```bash 
php artisan migrate:fresh --seed
```
Run server and node server
```bash
php artisan serve
```

```bash
npm run dev
```

## Docker

copy .env file
```bash
cp .env.example .env
```
configure database server and port
```env
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=task-managment
DB_USERNAME=sail
DB_PASSWORD=password
```

```bash
docker run --rm \
    -u "$(id -u):$(id -g)" \
    -v "$(pwd):/var/www/html" \
    -w /var/www/html \
    laravelsail/php83-composer:latest \
    composer install --ignore-platform-reqs
```

if you run into errors make sure to check if ports are available that application requires

After that run 
``` bash 
sail up -d # or ./vendor/bin/sail up -d     # in case you didn't added terminal alias
```
Migrate database and seed data
```bash
./vendor/bin/sail php artisan migrate:fresh --seed
```

```bash
./vendor/bin/sail npm install
```

```bash
./vendor/bin/sail npm run dev
```
