include .env
export $(shell sed 's/=.*//' .env)

LAST_COMMIT_HASH := $(shell git rev-parse HEAD)

up:
	docker-compose -f docker-compose-dev.yml up

watch:
	npm run watch

sh:
	docker-compose -f docker-compose.dev exec php-fpm /bin/sh

build-demo:
	docker --log-level=debug build --pull --file=./docker/prod/demo/php-fpm/prod.Dockerfile --tag=${REGISTRY}/saas-demo:${LAST_COMMIT_HASH} ./
	docker --log-level=debug build --pull --file=./docker/prod/demo/php-fpm/prod.Dockerfile --tag=${REGISTRY}/saas-demo:latest ./

push-demo:
	docker push ${REGISTRY}/saas-demo:${LAST_COMMIT_HASH}
	docker push ${REGISTRY}/saas-demo:latest

build-heroku-demo:
	docker --log-level=debug build --pull --file=./docker/prod/heroku/php-fpm/prod.Dockerfile --tag=registry.heroku.com/${HEROKU_APP_NAME}/web ./

push-heroku-demo:
	docker push registry.heroku.com/${HEROKU_APP_NAME}/web
