include .env
export $(shell sed 's/=.*//' .env)

up:
	docker-compose -f docker-compose-dev.yml up

watch:
	npm run watch

sh:
	docker-compose -f docker-compose.dev exec php-fpm /bin/sh

build-demo:
	docker --log-level=debug build --pull --file=./docker/prod/demo/demo-prod.Dockerfile --tag=${REGISTRY}/saas-demo:${LAST_COMMIT_HASH} ./
	docker --log-level=debug build --pull --file=./docker/prod/demo/demo-prod.Dockerfile --tag=${REGISTRY}/saas-demo:latest ./
