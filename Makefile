
DOCKER_COMPOSE = docker compose
PHP_ARTISAN = php artisan

setup: up composer-install create-env key-generate migrate

up:
	$(DOCKER_COMPOSE) up -d

composer-install:
	$(DOCKER_COMPOSE) exec app composer install

create-env:
	$(DOCKER_COMPOSE) exec app cp .env.example .env

key-generate:
	$(DOCKER_COMPOSE) exec app $(PHP_ARTISAN) key:generate

migrate:
	$(DOCKER_COMPOSE) exec app $(PHP_ARTISAN) migrate --seed

down:
	$(DOCKER_COMPOSE) down
