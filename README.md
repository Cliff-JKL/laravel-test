# Message Sender

## Description

This app is built with:
- Laravel framework
- PostgreSQL Database
- Docker

## Installation

1. Download and start docker containers:

```bash
docker-compose up -d
```

2. install composer dependencies:

```bash
docker exec -it messageSender-php-fpm composer install
```

3. Then use migrations to update database:

```bash
docker exec -it messageSender-php-fpm php artisan migrate
```

## Running the app

Open in browser: (<a href="http://localhost" target="_blank">localhost</a>).