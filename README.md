# Laravel Library Management System (Sistem Manajemen Perpustakaan)

Welcome to the Laravel Library Management System! This is a robust web application designed to manage library operations efficiently. It includes features for book management, member management, borrowing/returning processes, and reporting.

## 🚀 Features

- **User Roles & Authentication**:
    - **Admin**: Full access to the system, user management, and configuration.
    - **Librarian**: Manage books, categories, and borrowing transactions.
    - **Member (User)**: Browse books, view borrowing history, and bookmark books.
- **Book Management**: Add, edit, delete books, and manage stock.
- **Category Management**: Organize books into categories.
- **Borrowing System**: Streamlined process for borrowing and returning books with status tracking.
- **Reporting**: Generate reports (PDF support included).
- **Responsive Design**: Modern UI built with Tailwind CSS.

---

## 🛠️ Installation / Penginstallan

You have two options to install and run this project:

1.  **Option 1: Docker (Recommended)** - Automated setup using a shell script.
2.  **Option 2: Manual Installation** - Standard Laravel setup.

### Option 1: Docker Installation (Recommended)

This method is the easiest and ensures your environment matches dependencies exactly. We have provided a helper script to automate the process.

**Prerequisites:**

- Docker & Docker Compose installed on your machine.
- Linux/Mac environment (or WSL2 on Windows).

**Steps:**

1.  **Clone the repository** (if you haven't already):

    ```bash
    git clone <repository-url>
    cd laravel-perpustakaan-management-system
    ```

2.  **Run the automated install script**:

    Make sure the script is executable and run it:

    ```bash
    chmod +x install.sh
    ./install.sh
    ```

    > **What does this script do?**
    >
    > - Sets executable permissions for helper scripts (`start.sh`, `stop.sh`, etc.).
    > - Starts the Docker containers (Nginx, PHP, MySQL, Node).
    > - Installs PHP dependencies via Composer.
    > - Generates the application key.
    > - Runs database migrations and seeds dummy data.
    > - Installs Node.js dependencies and builds frontend assets.

3.  **Access the Application**:
    Once the script finishes successfully, open your browser and go to:

    [http://localhost](http://localhost)

---

### Option 2: Manual Installation

If you prefer running PHP locally or don't have Docker, follow these steps.

**Prerequisites:**

- PHP >= 8.2
- Composer
- Node.js & NPM
- MySQL Database

**Steps:**

1.  **Clone the repository**:

    ```bash
    git clone <repository-url>
    cd laravel-perpustakaan-management-system
    ```

2.  **Install PHP Dependencies**:

    ```bash
    composer install
    ```

3.  **Setup Environment File**:
    Copy the example .env file and configure it.

    ```bash
    cp .env.example .env
    ```

    Open `.env` and set your database credentials:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=ukk_library_db
    DB_USERNAME=root
    DB_PASSWORD=your_password
    ```

4.  **Generate Application Key**:

    ```bash
    php artisan key:generate
    ```

5.  **Run Migrations & Seeders**:
    This will create tables and insert dummy data.

    ```bash
    php artisan migrate --seed
    ```

6.  **Install & Build Frontend**:

    ```bash
    npm install
    npm run build
    ```

7.  **Run Local Server**:
    ```bash
    php artisan serve
    ```
    Access at: [http://localhost:8000](http://localhost:8000)

---

## 🔑 Default Accounts (Akun Bawaan)

The database seeding process creates several default accounts for testing:

| Role              | Username         | Password   |
| :---------------- | :--------------- | :--------- |
| **Administrator** | `admin`          | `password` |
| **Librarian**     | `siti.librarian` | `password` |
| **User**          | `dafa.ali`       | `password` |
| **User**          | `budi.santoso`   | `password` |

> **Note**: All default passwords are set to `password`.

---

## 📜 Helper Scripts

The project includes several shell scripts to make your life easier (especially if using Docker):

- `./install.sh`: Full automated setup for Docker.
- `./start.sh`: Starts the Docker containers.
- `./stop.sh`: Stops the Docker containers.
- `./artisan.sh`: Runs Artisan commands inside the Docker container (e.g., `./artisan.sh migrate`).
- `./npm.sh`: Runs NPM commands inside the Docker container.

---

## 📄 License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
