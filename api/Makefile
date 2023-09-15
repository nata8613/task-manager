up:
	@docker-compose up -d

down:
	@docker-compose down

recreate:
	@docker-compose up -d --build --force-recreate   --remove-orphans

clear:
	@docker exec task-manager-php rm -rf var/cache
	@docker exec task-manager-php bin/console doctrine:cache:clear-metadata
	@docker exec task-manager-php composer dump-autoload --optimize --classmap-authoritative --ansi
	@docker exec task-manager-php php bin/console cache:warmup

migration:
	@docker exec task-manager-php bin/console doctrine:cache:clear-metadata
	@docker exec task-manager-php bin/console doctrine:migrations:diff

migrate:
	@docker exec task-manager-php bin/console doctrine:migrations:migrate --no-interaction

help:
	@echo "Available targets:"
	@echo "  - up: Run Symfony application and Docker locally"
	@echo "  - down: Tear Down Docker"
	@echo "  - recreate: Recreate Docker containers"
	@echo "  - clear: Clear Symfony API cache command"
	@echo "  - migration: Creating Database Migration"
	@echo "  - migrate: Migrating Project Database"
