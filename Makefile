.PHONY: help \
artisan-key \
composer-install config \
install npm-install npm-run-dev \
npm-watch shell tinker uninstall \
up upd stop

.DEFAULT_GOAL := help

PHP_CONTAINER := szallas-frontend-php-fpm
NODE_CONTAINER := node:18.14
NODE_VITE_PORT := 5173:5173

# Set dir of Makefile to a variable to use later
MAKEPATH := $(abspath $(lastword $(MAKEFILE_LIST)))
PWD := $(dir $(MAKEPATH))

USER_ID=$(shell id -u)
GROUP_ID=$(shell id -g)

NODE := docker run -u $(USER_ID):$(GROUP_ID) -it -v $(PWD):/application -w /application -p $(NODE_VITE_PORT) --rm node:19

help: ## * Show help (Default task)
	@grep -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-30s\033[0m %s\n", $$1, $$2}'

config: ## Setup step #1: Create .env for the admin project
	cp -f .env.example .env
	docker exec -it $(PHP_CONTAINER) usermod -u $(USER_ID) www-data
	docker exec -it $(PHP_CONTAINER) groupmod -g $(GROUP_ID) www-data

composer-install: ## Setup step #2: Run composer install
	docker exec -it $(PHP_CONTAINER) composer install

artisan-key: ## Setup step #3: Run composer install
	docker exec -it $(PHP_CONTAINER) php artisan key:generate

npm-install: ## Setup step #4: Run npm install
	$(NODE) npm install

npm-dev: ## Setup step #5: Run npm run dev
	$(NODE) npm run dev

npm-build: ## Run npm run build
	$(NODE) npm run build

npm-test: ## Run npm run test
	$(NODE) npm run test
npm-test-watch: ## Run npm run test in watch mode
	$(NODE) npm run test-watch

npm-test-coverage: ## Run npm run test coverage
	$(NODE) npm run coverage

install: config composer-install artisan-key npm-install npm-build  ## Run the setup steps automatically

uninstall: ## Cleanup project by removing .env, PHP packages, node modules, files under the storage directory, etc.
	rm -f .env
	rm -f storage/logs/*.log
	rm -f storage/app/public/*
	rm -rf storage/framework/cache/data/*
	rm -rf vendor
	rm -rf node_modules
	rm -rf coverage
	rm -rf resources/json/*

shell: ## Open bash as host user in the PHP container
	docker exec -u $(USER_ID):$(GROUP_ID) -it $(PHP_CONTAINER) bash

shell-root: ## Open bash as root in the PHP container
	docker exec -it $(PHP_CONTAINER) bash

tinker: ## Run Artisan Tinker
	docker exec -it $(PHP_CONTAINER) php artisan tinker

up: ## Run docker-compose up with
	cd ../km-main && docker-compose -p szallas up
	cd -

upd: ## Run docker-compose up with -d
	cd ../km-main && docker-compose -p szallas up -d
	cd -

stop: ## Stop docker containers
	cd ../km-main && docker-compose -p szallas stop
	cd -
