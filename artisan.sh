#!/bin/bash

# Pass all arguments to the artisan command inside the container
docker compose exec app php artisan "$@"
