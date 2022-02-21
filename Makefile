include .env
THIS_FILE := $(lastword $(MAKEFILE_LIST))
.PHONY: up down stop start help
default: up
up:
	@echo "Start container for $(PROJECT_NAME)"
	@echo "Just wait..."
	docker-compose pull
	docker-compose up -d --remove-orphans
down:
	stop
stop:
	@echo "Stop container for $(PROJECT_NAME)..."
	@echo "Just wait..."
	@docker-compose stop
start:
	@echo "Start container for $(PROJECT_NAME) from where you left off..."
	@echo "Just wait..."
	@docker-compose start
help:
	@sed -n 's/^##//p' $<