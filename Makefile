run:
	docker-compose up

init:
	docker exec -it li-techtest_php_1 make deps

deps: composer.phar
	php composer.phar install --no-interaction

composer.phar:
	curl -sS https://getcomposer.org/installer | php

test:
	docker exec -it li-techtest_php_1 make deps
