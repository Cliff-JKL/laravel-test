# Message Sender

## Description

This app is built with:
- Laravel framework
- PostgreSQL Database
- Docker

## Installation

1. Download and start docker containers:

```bash
$ docker-compose up -d
```

2. Then install dependencies and update database:

```bash
$ docker exec -it messageSender-php-fpm composer install

$ docker exec -it messageSender-php-fpm php artisan migrate
```

## Running the app

Open in browser: (<a href="localhost" target="_blank">localhost</a>).