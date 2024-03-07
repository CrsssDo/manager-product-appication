# Insight

## Getting Started

```bash
export WWWUSER=${WWWUSER:-$UID}
export WWWGROUP=${WWWGROUP:-$(id -g)}
```

### Configuration

Copy `.env.example` to `.env` then update the configuration to match with your development environment.

Learn more at https://laravel.com/docs/9.x/configuration#environment-configuration

### Start with docker

1. Run:

```bash
docker-compose up -d
```

2. Migrate database

```bash
docker-compose exec app php artisan migrate
```

4. Migrate seed data

```bash
docker-compose exec app php artisan db:seed
```

5. Generate key

```bash
docker-compose exec app php artisan key:generate
```

### PHP

```shell
php artisan serve
```

#### Server is running on port: 8000

http://localhost:8000
