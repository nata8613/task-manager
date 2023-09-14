start:
	@docker-compose up -d
	@symfony server:stop
	@symfony server:start --no-tls --port=8080

stop:
	@docker-compose stop
	@symfony server:stop

help:
	@echo "Available targets:"
	@echo "  - start: Run Symfony application and Docker locally"
	@echo "  - stop: Stop the local Symfony server"