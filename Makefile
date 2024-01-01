CONTAINER_NAME ?= aruka-app

composer-install:
	docker exec -it $(CONTAINER_NAME) composer install

composer-update:
	docker exec -it $(CONTAINER_NAME) composer update

composer-dump-autoload:
	docker exec -it $(CONTAINER_NAME) composer dump-autoload

sh:
	docker exec -it $(CONTAINER_NAME) sh

pint:
	docker exec -i $(CONTAINER_NAME) ./vendor/bin/pint

test:
	docker exec -it $(CONTAINER_NAME) ./framework/vendor/bin/phpunit ./framework/tests --colors
