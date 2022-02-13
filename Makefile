include .env
up:
	docker-compose -f docker-compose.yml build
down:
	docker-compose -f docker-compose.yml down
stop:
	docker-compose -f docker-compose.yml stop
start:
	docker-compose -f docker-compose.yml start