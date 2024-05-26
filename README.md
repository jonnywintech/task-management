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

