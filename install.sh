#!/bin/bash

# Check if vendor exists to see if already installed
if [ -d "vendor" ]; then
    echo "⚠️  Laravel seems to be already installed (vendor directory exists)."
    exit 1
fi

echo "📦 Installing Laravel into a temporary directory..."

# Run composer create-project in a temp folder inside the container
docker run --rm -v $(pwd):/var/www -w /var/www laravelsail/php84-composer:latest bash -c "composer create-project laravel/laravel temp_app && cp -rT temp_app . && rm -rf temp_app"

echo "✅ Laravel files moved to root directory."

docker run --rm -v $(pwd):/var/www -w /var/www laravelsail/php84-composer:latest bash -c "php -r \"file_exists('.env') || copy('.env.example', '.env');\""

echo "⚙️  Configuring environment..."
# Only replace if DB_HOST is not already set to db
if grep -q "DB_HOST=127.0.0.1" .env; then
    sed -i 's/DB_CONNECTION=sqlite/DB_CONNECTION=mysql/g' .env
    sed -i 's/DB_HOST=127.0.0.1/DB_HOST=db/g' .env
    sed -i 's/DB_PORT=3306/DB_PORT=3306/g' .env
    sed -i 's/DB_DATABASE=laravel/DB_DATABASE=ukk_library_db/g' .env
    sed -i 's/DB_USERNAME=root/DB_USERNAME=laravel/g' .env
    sed -i 's/DB_PASSWORD=/DB_PASSWORD=root/g' .env
fi

echo "🚀 Setup complete! Run ./start.sh to start the servers."
