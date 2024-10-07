check:
	composer check

csfix:
	composer fix

start:
	docker-compse up

start.daemon:
	docker-compose up -d

stop:
	docker-compose down

restart: stop start-deamon

update:
	composer install

