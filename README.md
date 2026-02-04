# 📚 Laravel Library Management System (Perpustakaan)

A comprehensive library management system built with Laravel 12, designed for managing books, borrowings, users, and generating detailed reports. This system supports multiple user roles (Admin, Librarian, User) with role-based access control.

## ✨ Features

### 👥 User Management

- **Multi-role Authentication**: Admin, Librarian, and User roles
- **User Profile Management**: Update username, password, and profile photo
- **Email Verification**: Secure account verification system
- **Role-based Access Control**: Different permissions for each user role

### 📖 Book Management

- **Complete CRUD Operations**: Create, read, update, and delete books
- **Book Catalog**: Browse and search through available books
- **Book Details**: View comprehensive information including cover images, author, publisher, publication year, synopsis
- **Category Management**: Organize books with multiple categories
- **Stock Management**: Track book availability in real-time
- **Book Reviews**: Users can rate and review books they've borrowed
- **Bookmarks**: Save favorite books for quick access

### 📋 Borrowing System

- **Borrowing Workflow**: Request → Approval → Return confirmation
- **Approval System**: Admin/Librarian can approve or reject borrowing requests
- **Borrowing History**: Track all borrowing transactions
- **Status Tracking**: Monitor borrowing status (pending, approved, rejected, returned, overdue)
- **Borrowing Proof**: Generate downloadable PDF proof of borrowing
- **Return Confirmation**: Admin/Librarian confirms book returns

### 📊 Reporting & Analytics

- **PDF Reports**: Generate comprehensive reports in PDF format
    - Borrowing Report (with date filtering)
    - Books Report (with category filtering)
    - Users Report (with role filtering)
    - Statistics Report (comprehensive system statistics)
- **Excel Export**: Export all reports to Excel format for further analysis
- **Dashboard Analytics**: Visual statistics for admins

### 🔐 Security Features

- **Laravel Breeze Authentication**: Secure authentication scaffolding
- **Middleware Protection**: Custom middleware for role-based route protection
    - `IsAdmin`: Admin and Librarian access
    - `IsStrictAdmin`: Admin-only access
    - `IsUser`: Regular user access
- **Email Verification**: Required for accessing system features
- **CSRF Protection**: Built-in Laravel security

## 🖥️ System Requirements

### Server Requirements

- **PHP**: ^8.2 or higher
- **Database**: SQLite (default) or MySQL/PostgreSQL
- **Web Server**: Apache/Nginx (or PHP built-in server for development)
- **Composer**: Latest version
- **Node.js**: v16 or higher
- **NPM**: Latest version

### PHP Extensions Required

- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP Extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- GD or Imagick Extension (for image processing)

### Development Tools (Optional)

- Docker & Docker Compose (for containerized development)
- Git (for version control)

## 🚀 Installation

### Option 1: Standard Installation

1. **Clone the repository**

    ```bash
    cd /path/to/your/workspace
    git clone <repository-url>
    cd laravel-perpustakaan-management-system
    ```

2. **Install PHP dependencies**

    ```bash
    composer install
    ```

3. **Copy environment file**

    ```bash
    cp .env.example .env
    ```

4. **Generate application key**

    ```bash
    php artisan key:generate
    ```

5. **Configure database**

    The default configuration uses SQLite. The database file will be created automatically.

    For MySQL/PostgreSQL, edit `.env` file:

    ```env
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=perpustakaan_db
    DB_USERNAME=your_username
    DB_PASSWORD=your_password
    ```

6. **Run migrations and seeders**

    ```bash
    php artisan migrate:fresh --seed
    ```

7. **Install frontend dependencies**

    ```bash
    npm install
    ```

8. **Build frontend assets**

    ```bash
    npm run build
    ```

9. **Create storage link**

    ```bash
    php artisan storage:link
    ```

10. **Start the development server**

    ```bash
    php artisan serve
    ```

11. **Access the application**

    Open your browser and navigate to: `http://localhost:8000`

### Option 2: Docker Installation

1. **Clone the repository**

    ```bash
    git clone <repository-url>
    cd laravel-perpustakaan-management-system
    ```

2. **Run the installation script**

    ```bash
    chmod +x install.sh
    ./install.sh
    ```

3. **Access the application**

    Open your browser and navigate to: `http://localhost`

### Docker Management Commands

- **Start containers**: `./start.sh`
- **Stop containers**: `./stop.sh`
- **Run artisan commands**: `./artisan.sh <command>`
- **Run npm commands**: `./npm.sh <command>`

## 📝 Default Credentials

After running the seeders, you can login with these default accounts:

### Admin Account

- **Username**: `admin`
- **Password**: `password`

### Librarian Account

- **Username**: `librarian`
- **Password**: `password`

### User Account

- **Username**: `user`
- **Password**: `password`

> ⚠️ **Important**: Change these default passwords immediately in production!

## 🛠️ Configuration

### Email Configuration (Optional)

For email verification to work, configure your mail settings in `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_username
MAIL_PASSWORD=your_password
MAIL_FROM_ADDRESS="library@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

### Storage Configuration

Ensure the following directories are writable:

- `storage/app`
- `storage/framework`
- `storage/logs`
- `bootstrap/cache`

Set proper permissions:

```bash
chmod -R 775 storage bootstrap/cache
```

## 📦 Technology Stack

### Backend

- **Framework**: Laravel 12
- **PHP Version**: 8.2+
- **Authentication**: Laravel Breeze
- **PDF Generation**: DomPDF (barryvdh/laravel-dompdf)
- **Excel Export**: Laravel Excel (maatwebsite/excel)

### Frontend

- **CSS Framework**: Tailwind CSS 4.1.18
- **JavaScript**: Alpine.js 3.4.2
- **Build Tool**: Vite 7.0.7
- **HTTP Client**: Axios 1.11.0

### Database

- **Default**: SQLite
- **Supported**: MySQL, PostgreSQL

### Development Tools

- **Package Manager**: Composer & NPM
- **Testing**: PHPUnit 11.5.3
- **Code Quality**: Laravel Pint
- **Debugging**: Laravel Pail

## 🗂️ Project Structure

```
laravel-perpustakaan-management-system/
├── app/
│   ├── Http/
│   │   ├── Controllers/
│   │   │   ├── Admin/          # Admin controllers
│   │   │   ├── Auth/           # Authentication controllers
│   │   │   ├── BookController.php
│   │   │   ├── BorrowingController.php
│   │   │   └── HomeController.php
│   │   └── Middleware/
│   │       ├── IsAdmin.php     # Admin/Librarian middleware
│   │       ├── IsStrictAdmin.php # Admin-only middleware
│   │       └── IsUser.php       # User middleware
│   └── Models/
│       ├── User.php
│       ├── book.php
│       ├── borrowing.php
│       ├── book_category.php
│       └── ...
├── database/
│   ├── migrations/             # Database migrations
│   ├── seeders/                # Database seeders
│   └── factories/              # Model factories
├── resources/
│   └── views/
│       ├── admin/              # Admin views
│       ├── home/               # User views
│       ├── auth/               # Authentication views
│       └── landing.blade.php   # Landing page
├── routes/
│   ├── web.php                 # Web routes
│   └── auth.php                # Authentication routes
└── public/
    └── storage/                # Public storage (images, files)
```

## 🎯 Usage Guide

### For Regular Users

1. **Register/Login**: Create an account or login with existing credentials
2. **Browse Books**: View the book catalog and search for books
3. **Borrow Books**: Select a book and submit a borrowing request
4. **Track Borrowings**: Check borrowing history and status
5. **Bookmarks**: Save favorite books for later
6. **Reviews**: Rate and review books you've borrowed

### For Librarians

1. **Manage Books**: Add, edit, or remove books from the catalog
2. **Approve Borrowings**: Review and approve/reject borrowing requests
3. **Confirm Returns**: Confirm when books are returned
4. **Manage Categories**: Organize books by categories
5. **Generate Reports**: Create borrowing and book reports

### For Administrators

All librarian features plus:

- **User Management**: Create, edit, or delete user accounts
- **Role Assignment**: Assign roles to users
- **Complete Analytics**: Access all system reports and statistics
- **System Configuration**: Manage system-wide settings

## 🧪 Testing

Run the test suite:

```bash
php artisan test
```

Or using PHPUnit directly:

```bash
./vendor/bin/phpunit
```

## 🔧 Development

Start the development environment:

```bash
composer dev
```

This will concurrently run:

- Laravel development server
- Queue worker
- Log viewer (Pail)
- Vite development server

## 📄 License

This project is licensed under the MIT License.

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📞 Support

If you encounter any issues or have questions, please open an issue on the GitHub repository.

## 🎓 About

This Library Management System (Sistem Manajemen Perpustakaan) was developed as a comprehensive solution for library operations, featuring modern web technologies and best practices in Laravel development.

---

**Made by aldap using Laravel & Tailwind CSS**
