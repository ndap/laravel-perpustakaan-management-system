#!/bin/bash

# Pass all arguments to the artisan command inside the container
docker compose exec -u "$(id -u):$(id -g)" app php artisan "$@"
