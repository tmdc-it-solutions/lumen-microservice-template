install:
	cp .env.example .env
	cp phpunit.xml.dist phpunit.xml
	cp app/Providers/Stub/MicroserviceRegistryProvider.stub app/Providers/MicroserviceRegistryProvider.php 
	docker-compose build

build:
	docker-compose build

up:
	docker-compose up -d

down:
	docker-compose down

shell:
	docker-compose exec lumen sh