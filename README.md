# Event Management & QR Code Attendance System

A comprehensive Laravel-based event management platform with QR code attendance tracking, built with modern web technologies and Arabic language support.

## 🚀 Features

### Core Functionality

-   **Event Management**: Create, manage, and display events with detailed information
-   **QR Code Attendance**: Generate unique QR codes for event registration and check-in
-   **Multi-Role Admin System**: Different access levels (Admin, User, Scanner)
-   **Real-time QR Scanner**: Web-based QR code scanner for attendance validation
-   **Email Notifications**: Automated confirmation emails with QR codes
-   **Responsive Design**: Mobile-first design with Arabic RTL support

### Technical Features

-   **Laravel 12**: Latest Laravel framework with modern PHP 8.4
-   **Livewire Integration**: Dynamic components for real-time interactions
-   **QR Code Generation**: SimpleSoftwareIO QR Code package integration
-   **Role-Based Access Control**: Custom middleware for different user roles
-   **Email System**: Laravel Mail with attendance confirmations
-   **Database Management**: MySQL with comprehensive migrations and seeders

## 🛠️ Tech Stack

### Backend

-   **PHP 8.4.12**
-   **Laravel 12.3.0**
-   **MySQL Database**
-   **Laravel Livewire 3.6.2**
-   **SimpleSoftwareIO QR Code 4.2**

### Frontend

-   **Tailwind CSS 3.4.17**
-   **Alpine.js 3.14.8**
-   **Font Awesome Icons**
-   **Arabic Font Support (Noto Sans Arabic)**

### Development Tools

-   **Laravel Breeze 2.3.6** (Authentication scaffolding)
-   **Laravel Pint 1.21.2** (Code formatting)
-   **Laravel Sail 1.41.0** (Docker development)
-   **PHPUnit 11.5.14** (Testing framework)

## 📋 System Requirements

-   PHP >= 8.2
-   Composer
-   MySQL 5.7+ or MariaDB 10.2+
-   Node.js & NPM (for frontend assets)
-   Web server (Apache/Nginx)

## 🚀 Installation

1. **Clone the repository**

    ```bash
    git clone <repository-url>
    cd livewire-app
    ```

2. **Install PHP dependencies**

    ```bash
    composer install
    ```

3. **Install Node.js dependencies**

    ```bash
    npm install
    ```

4. **Environment setup**

    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

5. **Database configuration**

    - Update `.env` with your database credentials
    - Run migrations: `php artisan migrate`
    - Seed the database: `php artisan db:seed`

6. **Build frontend assets**

    ```bash
    npm run build
    # or for development
    npm run dev
    ```

7. **Start the application**
    ```bash
    php artisan serve
    ```

## 🏗️ Project Structure

```
livewire-app/
├── app/
│   ├── Http/Controllers/          # Application controllers
│   │   ├── authController.php     # Authentication controller
│   │   ├── EventController.php    # Event management
│   │   └── QRScannerController.php # QR code scanning
│   ├── Livewire/                  # Livewire components
│   │   ├── Admin/                 # Admin panel components
│   │   └── Front/                 # Frontend components
│   ├── Models/                    # Eloquent models
│   │   ├── Admin.php             # Admin user model
│   │   ├── Event.php             # Event model
│   │   └── Attendance.php        # Attendance tracking
│   └── Mail/                     # Email templates
├── resources/views/              # Blade templates
│   ├── admin/                    # Admin panel views
│   └── front/                    # Public-facing views
├── routes/                       # Application routes
└── database/                     # Migrations and seeders
```

## 🔐 User Roles & Permissions

### Admin Role

-   Full system access
-   Event creation and management
-   User management
-   QR code scanning
-   Attendance reports

### User Role

-   View personal attendance records
-   Basic account management

### Scanner Role

-   QR code scanning for check-ins
-   Attendance validation

## 📱 Key Features Explained

### Event Registration Flow

1. Users browse available events on the public page
2. Click to view event details and register
3. System generates unique QR code for each registration
4. Confirmation email sent with QR code attachment
5. Users can download/view their QR code

### QR Code Check-in Process

1. Admin/Scanner uses the web-based QR scanner
2. QR code is scanned and validated
3. System checks for duplicate usage
4. Attendance is marked and timestamped
5. Real-time feedback provided to scanner

### Multi-language Support

-   Full Arabic language support
-   RTL (Right-to-Left) layout
-   Arabic date formatting
-   Localized error messages

## 🎨 UI/UX Features

-   **Modern Design**: Clean, professional interface with gradient effects
-   **Responsive Layout**: Mobile-first design that works on all devices
-   **Arabic Typography**: Beautiful Arabic font rendering
-   **Interactive Elements**: Hover effects, animations, and smooth transitions
-   **Color Scheme**: Orange/red gradient theme with professional styling

## 🔧 Configuration

### Email Settings

Configure SMTP settings in `.env`:

```env
MAIL_MAILER=smtp
MAIL_HOST=your-smtp-host
MAIL_PORT=587
MAIL_USERNAME=your-email
MAIL_PASSWORD=your-password
MAIL_ENCRYPTION=tls
```

### QR Code Settings

QR codes are generated with:

-   Event-specific tokens
-   Attendee-specific tokens
-   JSON data structure for validation

## 📊 Database Schema

### Key Tables

-   `admins`: User accounts with role-based access
-   `events`: Event information and metadata
-   `attendances`: Registration and check-in records
-   `settings`: System configuration

## 🧪 Testing

Run the test suite:

```bash
php artisan test
```

## 🚀 Deployment

1. **Production Environment**

    - Set `APP_ENV=production`
    - Configure proper database credentials
    - Set up SSL certificate
    - Configure web server (Apache/Nginx)

2. **Asset Compilation**
    ```bash
    npm run build
    php artisan config:cache
    php artisan route:cache
    php artisan view:cache
    ```

## 🤝 Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Add tests if applicable
5. Submit a pull request

## 📄 License

This project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## 📞 Support

For support and questions, please contact the development team or create an issue in the repository.

---

**Built with ❤️ using Laravel, Livewire, and modern web technologies**
