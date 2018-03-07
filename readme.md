Estudo básico do Laravel

- Laragon 3.1
- Laravel 5.6

### Installation
1. Install Composer using detailed installation instructions [here](https://getcomposer.org/doc/00-intro.md#installation-linux-unix-osx)
2. Install Node.js using detailed installation instructions [here](https://nodejs.org/en/download/package-manager/)
3. Clone repository
```
$ git clone https://github.com/SergioDiniz/laravel-basico.git
```
4. Change into the working directory
```
$ cd laravel-basico
```
5. Copy `.env.example` to `.env` and modify according to your environment
```
$ cp .env.example .env
```
6. Install composer dependencies
```
$ composer install --prefer-dist
```
7. An application key can be generated with the command
```
$ php artisan key:generate
```

### Run
To start the PHP built-in server
```
$ php artisan serve --port=8080
