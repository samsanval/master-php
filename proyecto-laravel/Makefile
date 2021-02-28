migrate: ## migrate
	docker exec -ti php php artisan migrate

seed: ##seed
	docker exec -ti php php artisan db:seed --class=$(CLASS)

controller:
	docker exec -ti php php artisan make:controller $(CONTROLLERNAME)

