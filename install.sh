#!/bin/bash

# --- VARIABLES & COLORS (Biar Aesthetic) ---
RED='\033[0;31m'
GREEN='\033[0;32m'
YELLOW='\033[1;33m'
BLUE='\033[0;34m'
CYAN='\033[0;36m'
NC='\033[0m' # No Color

# --- ASCII ART HEADER ---
clear
echo -e "${CYAN}"
cat << "EOF"
  _                              _   
 | |    __ _ _ __ __ ___   _____| |  
 | |   / _` | '__/ _` \ \ / / _ \ |  
 | |__| (_| | | | (_| |\ V /  __/ |  
 |_____\__,_|_|  \__,_| \_/ \___|_|  
                                     
      🚀 DOCKER INSTALLER SCRIPT      
EOF
echo -e "${NC}"
echo -e "${BLUE}[INFO] Starting setup process... Hold tight!${NC}\n"

# --- HELPER FUNCTION (Logic Sukses/Gagal) ---
# Function ini buat ngejalanin command + handle error otomatis
run_task() {
    local description="$1"
    local command="$2"

    echo -ne "${YELLOW}⏳ $description...${NC}"

    # Jalanin command, simpan output error ke /dev/null biar rapi (opsional)
    # Kalau mau debug, apus '2>&1 >/dev/null'
    if eval "$command" > /dev/null 2>&1; then
        # Kalo SUKSES (Exit code 0)
        echo -e "\r${GREEN}✅ $description - DONE!${NC}          "
    else
        # Kalo GAGAL (Exit code bukan 0)
        echo -e "\r${RED}❌ $description - FAILED!${NC}          "
        echo -e "\n${RED}[CRITICAL ERROR]${NC} Waduh, proses berhenti di step ini."
        echo -e "Cek logs docker atau permission lo ya.\n"
        exit 1 # Matiin script biar gak lanjut
    fi
}

# --- PROCESS ---

# 1. Setup Permissions
run_task "Making start.sh executable" "chmod +x start.sh"
run_task "Making artisan.sh executable" "chmod +x artisan.sh"
run_task "Making stop.sh executable" "chmod +x stop.sh"
run_task "Making npm.sh executable" "chmod +x npm.sh"

# 2. Start Containers
# Kita asumsiin start.sh itu isinya 'docker-compose up -d'
run_task "Spinning up Docker containers" "./start.sh"

# Kasih jeda dikit biar database container siap (opsional tapi recommended)
echo -ne "${BLUE}💤 Waiting for containers to stabilize (5s)...${NC}\r"
sleep 5

# 3. PHP Dependencies
run_task "Installing PHP dependencies (Composer)" "docker-compose exec -T -u root app composer install --no-interaction --prefer-dist"

# 4. Generate Key
run_task "Generating Application Key" "docker-compose exec -T -u root app php artisan key:generate"

# 5. Migrations
run_task "Migrating Database & Seeding" "./artisan.sh migrate:fresh --seed"

# 6. Node Dependencies
run_task "Installing Node modules" "docker compose exec node npm install"

# 7. Build Frontend
run_task "Building Frontend Assets" "docker compose exec node npm run build"

# --- FINISH ---
echo -e "\n${GREEN}=============================================${NC}"
echo -e "${GREEN}🎉  INSTALLATION COMPLETE! YOU ARE READY!  🎉${NC}"
echo -e "${GREEN}=============================================${NC}"
echo -e "🌍 Access your site at: ${CYAN}http://localhost${NC}"
echo -e "💻 Happy Coding!\n"