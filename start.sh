#!/bin/bash

echo "🚀 Starting Docker environment..."

if docker compose up -d --build; then
    echo -e "\n✅ Environment is running!"
    echo "-----------------------------------"
    echo "📍 Web App: http://localhost"
    # echo "📍 PHPMyAdmin: http://localhost:8080"
    echo "-----------------------------------"
else
    echo -e "\n❌ Terjadi kesalahan saat menjalankan Docker Compose."
    echo "Silakan cek pesan error di atas dan pastikan Docker Engine sudah berjalan."
    exit 1
fi