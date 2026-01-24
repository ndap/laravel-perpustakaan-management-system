# Laravel Perpustakaan Management System

A robust and modern Library Management System built with Laravel. This application streamlines the process of managing books, borrowings, users, and reports for libraries. It features a multi-role system (Admin, Librarian, User) and a clean, responsive UI built with Tailwind CSS.

## 🚀 Features

### core Features

- **Authentication & Authorization**: Secure login system with role-based access control (Admin, Librarian, User).
- **Book Management**:
    - CRUD operations for books.
    - Stock management.
    - Category categorization.
    - Book details with rich information.
- **Borrowing System**:
    - Users can request to borrow books.
    - Approval workflow for Admins/Librarians.
    - Return management with fine calculation (if applicable).
    - Borrowing history tracking.
- **User Management**:
    - Admin can manage users (Add, Edit, Delete).
    - Profile management for users (Update profile, Change password).
- **Bookmarking**: Users can bookmark/favorite books for later reference.
- **Reporting**: Generate and export PDF reports for borrowings and library activities.
- **Modern UI**: Responsive and interactive design using Tailwind CSS and Alpine.js.

### Roles & Permissions

- **Admin**: Full access to the system. Can manage users, books, categories, approve borrowings, and view all reports.
- **Librarian**: similar to Admin but focused on day-to-day operations like managing books and borrowings. Restricted from managing other administrators.
- **User**: Can browse books, request borrowings, manage their profile, and view their own borrowing history.

## 🛠 Tech Stack

- **Framework**: [Laravel 12.x](https://laravel.com)
- **Language**: PHP ^8.2
- **Frontend**:
    - [Blade Templates](https://laravel.com/docs/blade)
    - [Tailwind CSS](https://tailwindcss.com) (v3.x)
    - [Alpine.js](https://alpinejs.dev)
- **Database**: MySQL
- **Containerization**: Docker & Docker Compose
- **PDF Generation**: `barryvdh/laravel-dompdf`

---

## 💻 Installation

You can set up the project using **Docker** (Recommended) or **Manually**.

### Option 1: Docker (Recommended)

Ensure you have Docker and Docker Compose installed on your machine.

1.  **Clone the repository**

    ```bash
    git clone https://github.com/Start-Z/Laravel-Perpustakaan-Management-System.git
    cd laravel-perpustakaan-management-system
    ```

2.  **Setup Environment**
    Copy the example environment file:

    ```bash
    cp .env.example .env
    ```

    _Note: The defaults in `docker-compose.yml` usually match the standard `.env` values for Docker. Ensure `DB_HOST=db` in your `.env` file._

3.  **Start Containers**
    Build and start the application containers:

    ```bash
    docker-compose up -d --build
    ```

4.  **Install Dependencies**
    Install PHP and Node.js dependencies inside the containers:

    ```bash
    docker-compose exec app composer install
    docker-compose exec node npm install
    docker-compose exec node npm run build
    ```

5.  **Setup Database**
    Generate the application key and run migrations with seeders:

    ```bash
    docker-compose exec app php artisan key:generate
    docker-compose exec app php artisan migrate --seed
    ```

6.  **Access the Application**
    Open your browser and visit: `http://localhost`

### Option 2: Manual Installation

Ensure you have PHP 8.2+, Composer, Node.js, and MySQL installed locally.

1.  **Clone the repository**

    ```bash
    git clone <repository_url>
    cd laravel-perpustakaan-management-system
    ```

2.  **Install PHP Dependencies**

    ```bash
    composer install
    ```

3.  **Setup Environment**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

    _Update the `.env` file with your local database credentials (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`)._

4.  **Setup Database**
    Run migrations and seeders to populate the database with default data:

    ```bash
    php artisan migrate --seed
    ```

5.  **Install & Build Frontend Assets**

    ```bash
    npm install
    npm run build
    ```

6.  **Run Development Server**
    Start the Laravel development server:
    ```bash
    php artisan serve
    ```
    And in a separate terminal, run the Vite development server (optional if you built assets):
    ```bash
    npm run dev
    ```

---

## 📖 Usage Guide

### Default Login Credentials

The project comes with seeded data for quick testing. Use the following credentials:

| Role          | Email                    | Password   |
| :------------ | :----------------------- | :--------- |
| **Admin**     | `admin@perpustakaan.com` | `password` |
| **Librarian** | `siti@perpustakaan.com`  | `password` |
| **User**      | `budi.santoso@gmail.com` | `password` |

### Getting Started

1.  **Login** using one of the credentials above.
2.  **Admin Dashboard**: Navigate to the dashboard to see an overview of library statistics (Books, Users, Borrowings).
3.  **Manage Books**: Go to the "Books" section to add new titles, update stock, or edit details.
4.  **Borrowing Process**:
    - **User**: Browse the catalog -> Click "Pinjam" on a book -> Confirm request.
    - **Admin/Librarian**: Go to "Peminjaman" -> Approve or Reject the request.
    - **Return**: When a user returns a book, the Admin/Librarian marks it as returned in the system.
5.  **Reports**: Generate PDF reports from the reports section to analyze borrowing trends.

## 🤝 Contributing

1.  Fork the repository.
2.  Create a feature branch (`git checkout -b feature/amazing-feature`).
3.  Commit your changes (`git commit -m 'Add some amazing feature'`).
4.  Push to the branch (`git push origin feature/amazing-feature`).
5.  Open a Pull Request.

## 📝 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
