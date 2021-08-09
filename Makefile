PROD_COMPOSE = docker-compose.yml
DEV_COMPOSE = docker-compose.dev.yml

ENV_FILE=.env
ENV_SOURCE_FILE=.env.example

PHPUNIT_FILE=phpunit.xml
PHPUNIT_SOURCE_FILE=phpunit.xml.dist

MICROSERVICE_REGISTRY_PROVIDER_FILE=app/Providers/MicroserviceRegistryProvider.php
MICROSERVICE_REGISTRY_PROVIDER_SOURCE_FILE=app/Providers/Stub/MicroserviceRegistryProvider.stub

success:=$(shell tput setaf 2)
warn:=$(shell tput setaf 3)
reset:=$(shell tput sgr0)

install:

ifeq (,$(wildcard $(ENV_FILE)))
	cp $(ENV_SOURCE_FILE) $(ENV_FILE)
	$(info $(success)Installed $(ENV_FILE)$(reset))
else
	$(info $(warn)$(ENV_FILE) is already installed. Skipping...$(reset))
endif

ifeq (,$(wildcard $(PHPUNIT_FILE)))
	cp $(PHPUNIT_SOURCE_FILE) $(PHPUNIT_FILE)
	$(info $(success)Installed $(PHPUNIT_FILE)$(reset))
else
	$(info $(warn)$(PHPUNIT_FILE) is already installed. Skipping...$(reset))
endif

ifeq (,$(wildcard $(MICROSERVICE_REGISTRY_PROVIDER_FILE)))
	cp $(MICROSERVICE_REGISTRY_PROVIDER_SOURCE_FILE) $(MICROSERVICE_REGISTRY_PROVIDER_FILE)
	$(info $(success)Installed $(MICROSERVICE_REGISTRY_PROVIDER_FILE)$(reset))
else
	$(info $(warn)$(MICROSERVICE_REGISTRY_PROVIDER_FILE) is already installed. Skipping...$(reset))
endif
	$(info $(success)Install complete.$(reset))

build-prod:
	docker-compose build

build-dev:
	docker-compose -f $(PROD_COMPOSE) -f $(DEV_COMPOSE) build

prod:
	docker-compose up -d

dev:
	docker-compose -f $(PROD_COMPOSE) -f $(DEV_COMPOSE) up -d

down:
	docker-compose down --remove-orphans

shell:
	docker-compose exec lumen sh