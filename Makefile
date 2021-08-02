PROD_COMPOSE = docker-compose.yml
DEV_COMPOSE = docker-compose.dev.yml

install:
	cp .env.example .env
	cp phpunit.xml.dist phpunit.xml
	cp app/Providers/Stub/MicroserviceRegistryProvider.stub app/Providers/MicroserviceRegistryProvider.php 

build-prod:
	docker-compose build

build-dev:
	docker-compose -f $(PROD_COMPOSE) -f $(DEV_COMPOSE) build

prod:
	docker-compose up -d

dev:
	docker-compose -f $(PROD_COMPOSE) -f $(DEV_COMPOSE) up -d

down:
	docker-compose down

shell:
	docker-compose exec lumen sh