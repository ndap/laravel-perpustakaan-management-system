<div align="center">

  <img src="https://via.placeholder.com/1200x400?text=Laravel+Library+Management+System" alt="Library System Banner" width="100%">

  # 📚 Laravel Library Management System
  
  **Sistem Manajemen Perpustakaan Modern, Cepat, dan Anti Ribet.**

  <p>
    <a href="#"><img src="https://img.shields.io/badge/Laravel-11.x-FF2D20?style=for-the-badge&logo=laravel" alt="Laravel"></a>
    <a href="#"><img src="https://img.shields.io/badge/PHP-8.2-777BB4?style=for-the-badge&logo=php" alt="PHP"></a>
    <a href="#"><img src="https://img.shields.io/badge/Tailwind_CSS-3.0-38B2AC?style=for-the-badge&logo=tailwind-css" alt="Tailwind"></a>
    <a href="#"><img src="https://img.shields.io/badge/Docker-Ready-2496ED?style=for-the-badge&logo=docker" alt="Docker"></a>
    <a href="#"><img src="https://img.shields.io/github/license/dafa-ali/library-system?style=for-the-badge" alt="License"></a>
  </p>

  <p>
    <a href="#-features">Fitur</a> •
    <a href="#-tech-stack">Teknologi</a> •
    <a href="#-installation--penginstallan">Instalasi</a> •
    <a href="#-screenshots">Screenshots</a>
  </p>
</div>

---

## 🚀 Overview

Welcome to the **Laravel Library Management System**! Aplikasi ini didesain buat bikin hidup pustakawan dan member lebih mudah. Mulai dari minjem buku, balikin buku, sampe cetak laporan, semuanya bisa dilakukan dengan *sat-set* di sini. UI-nya udah pake Tailwind, jadi dijamin responsif dan enak dipandang.

## ✨ Features

| Role | Capabilities |
| :--- | :--- |
| **👑 Admin** | Full control system, manage users, config app. God mode. |
| **📚 Librarian** | Manage catalog buku, kategori, stock, dan transaksi peminjaman. |
| **👤 Member** | Browsing buku, liat history peminjaman, bookmark buku favorit. |

**Key Highlights:**
* ✅ **Stock Management:** Otomatis update stok saat dipinjam/dikembalikan.
* ✅ **PDF Reporting:** Generate laporan perpustakaan sekali klik.
* ✅ **Penalty System:** (Optional) Hitung denda telat otomatis.
* ✅ **Responsive UI:** Akses dari HP, Tablet, atau Laptop aman jaya.

---

## 🛠 Tech Stack

Aplikasi ini dibangun pake teknologi jaman *now*:

* **Backend:** Laravel 11
* **Frontend:** Blade Templates + Tailwind CSS
* **Database:** MySQL 8.0
* **Containerization:** Docker & Docker Compose

---

## 💾 Installation / Penginstallan

Pilih jalan ninjamu! Mau yang *auto-pilot* pake Docker atau manual?

<details open>
<summary><b>🐳 Option 1: Docker (Recommended - Paling Gampang)</b></summary>
<br>

Metode ini paling *recommended* biar environment laptop lo gak berantakan. Kita udah siapin script `install.sh` yang pinter.

1.  **Clone Repo**
    ```bash
    git clone <repository-url>
    cd laravel-perpustakaan-management-system
    ```

2.  **Jalankan Magic Script**
    Pastikan script bisa dieksekusi, lalu jalankan:
    ```bash
    chmod +x install.sh
    ./install.sh
    ```
    > ☕ **Tunggu sebentar.** Script ini bakal otomatis setup container, install composer, generate key, migrate db, seeding data, sampe build frontend aset. Lo tinggal duduk manis.

3.  **Akses Web**
    Buka browser dan gas ke: [http://localhost](http://localhost)

</details>

<details>
<summary><b>⚙️ Option 2: Manual Installation (The Old School Way)</b></summary>
<br>

Buat lo yang suka setup manual di local (XAMPP/Laragon/Valet).

**Prerequisites:** PHP >= 8.2, Composer, Node.js, MySQL.

1.  **Setup Environment**
    ```bash
    cp .env.example .env
    # Edit .env sesuaikan database lo
    ```

2.  **Install Dependencies**
    ```bash
    composer install
    npm install && npm run build
    ```

3.  **Database Setup**
    ```bash
    php artisan key:generate
    php artisan migrate --seed
    ```

4.  **Run Server**
    ```bash
    php artisan serve
    ```
    Akses di: [http://localhost:8000](http://localhost:8000)

</details>

## ⚡ Helper Scripts (Docker Users)

Biar gak capek ngetik `docker-compose exec ...` terus, pake ginian aja:

* `./start.sh` ➡️ Nyalain semua container.
* `./stop.sh` ➡️ Matiin container.
* `./artisan.sh migrate` ➡️ Jalanin artisan command di dalem docker.
* `./npm.sh run dev` ➡️ Jalanin npm command di dalem docker.

---

## 📸 Screenshots

<div align="center">
  <img src="https://via.placeholder.com/600x300?text=Dashboard+Admin" width="45%">
  <img src="https://via.placeholder.com/600x300?text=Katalog+Buku" width="45%">
</div>

---

<div align="center">

  **Made with ❤️ by [Dafa Ali]**
  
  Don't forget to ⭐ star this repo if you find it useful!

</div>