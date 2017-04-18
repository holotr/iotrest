# IoT Restful Api Dashboard

It is use Someline framework, Make by Tau'ri with love. Built on top of popular `Laravel 5.4 framework`, `Vue.js 2.0`, `Restful API`, `Repository Design`, `OAuth2`, `JWT`, `Unit Tests`, isolated front-end and back-end layer.

## Get Started

*Make sure you have already installed PHP 7.0 and [composer](https://getcomposer.org/doc/00-intro.md).*


### Get started via cloning repository

Clone this project to your working folder and open the directory:

```
git clone https://github.com/holotr/iotrest
```

#### Add to a git repository *(When Needed)*

Change `https://github.com/username/repository-name.git` to your own git repository address.

```
cd iotrest
rm -rf .git

git init
git add .
git commit -m 'Initial commit'

git remote add origin https://github.com/username/repository-name.git
git push -u origin master
```

## Installation

### Development Requirements

- PHP: >=7.0
- MySQL: >=5.7
- SQLite extension
- Laravel 5: https://laravel.com/docs/5.3/installation
- NodeJS: https://nodejs.org/
- Bower: https://bower.io/

### Install Essentials

Open `iotrest` folder *(Optional, run only when you are not inside the project root folder)*

```
cd iotrest
```

*All these commands should be executed under the root of someline-starter project*

Install composer dependencies
```
composer install
```

Install npm dependencies using [Yarn](https://yarnpkg.com/) dependency management (suggested)

Note: This command should be **outside** homestead environment. Also, you can still use `npm install` if you want.
```
yarn install
```

Install bower dependencies
```
bower install
```

Set-up Laravel, after these commands, please change `.env` file for your own environment settings
```
sudo cp .env.example .env
sudo chmod -R 777 storage
sudo chmod -R 777 bootstrap/cache
php artisan key:generate
```

### Database & Seeding

You need to create a Database e.g. `iot` with Encoding `utf8mb4` and Collation `utf8mb4_unicode_ci`.

`MySQL Query:`

```
CREATE DATABASE `iot` DEFAULT CHARACTER SET = `utf8mb4` DEFAULT COLLATE = `utf8mb4_unicode_ci`;
```

Change database config in `.env` file to the match the database that your just created.

After having database configuration setup, you can now do migrations and seeding.

```
php artisan migrate

php artisan db:seed
```

Install Laravel Passport with encryption keys to generate secure access tokens.

```
php artisan passport:install
```
