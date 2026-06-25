# Laravel CRUD Application

A modern, high-performance CRUD (Create, Read, Update, Delete) application built with **Laravel 11**, **Tailwind CSS**, and optimized for streamlined, production-ready cloud deployment.

This repository implements industry best practices for state management, continuous integration via GitHub Actions, and containerized deployment pipelines using single-stage Docker environments.

---

## 🚀 Features

* **Complete CRUD Engine**: Secure and optimized data management layers.
* **Persistent SQLite Volume Routing**: Designed to run entirely on a lightweight, persistent single-volume configuration.
* **Production-Ready Configuration**: Includes full server orchestrations via integrated Nginx, PHP-FPM, and Supervisor background monitors.
* **Automated CI/CD Pipeline**: Continuous deployment out of the box using built-in GitHub Actions workflows targeting Fly.io environments.
* **Tailwind CSS Integration**: Clean, modern, and fully responsive frontend styling interface.

---

## 🛠️ Tech Stack & Architecture

* **Framework**: Laravel 11 (PHP 8.4+)
* **Database**: SQLite (Configured for persistent cloud storage volumes)
* **Web Server Configuration**: Nginx + PHP-FPM managed sequentially via Supervisor
* **Frontend Asset Pipeline**: Vite + Tailwind CSS
* **Containerization**: Single-stage high-performance Docker environments
* **CI/CD Platform**: GitHub Actions

---

## 💻 Local Installation & Setup

To clone and spin up this project locally on your machine, follow these steps:

### Prerequisites
Ensure you have **PHP 8.4**, **Composer**, and **Node.js (v20+)** installed locally.

### 1. Clone the Repository
```bash
git clone [https://github.com/kouqhar/laravel-CRUD.git](https://github.com/kouqhar/laravel-CRUD.git)
cd laravel-CRUD
```

### 2. Install Dependencies
```bash
# Install PHP packages
composer install

# Install and compile frontend assets
npm install
npm run dev
```


### 3. Environment Configuration
   Copy the template environment file and generate your secure application encryption key:

```Bash
cp .env.example .env
php artisan key:generate
```

### 4. Database Setup
   Create a local SQLite database file and run the migrations:

```Bash
# Create the empty sqlite file
touch database/database.sqlite

# Run migrations
php artisan migrate
```

### 5. Boot the Application
   ```Bash
   php artisan serve
   ```

   Your application will now be accessible locally at http://127.0.0.1:8000.

## ☁️ Cloud Deployment (Fly.io)

This repository comes pre-packaged with all infrastructure blueprints needed to push straight to production using Fly.io.

### Infrastructure Manifest Files included:

- `fly.toml`: Configures network ports, HTTP load-balancing services, and binds your persistent hardware volumes.

- `Dockerfile`: A unified single-stage build layer handling system packages, internal PHP 8.4 initialization, and asset compilation workflows.

- `.fly/`: Houses runtime parameters for Nginx sites, PHP-FPM pooling profiles, and background worker daemon setups.

## Deploy via CLI
#### 1. Install the Fly CLI and authenticate:

```Bash
fly auth login
```

#### 2. Link your persistent volume to prevent database wipeouts during deployment updates:

```Bash
fly volumes create lab_db_volume --size 1 --region lhr
```

#### 3. Securely set your production application encryption key:

```Bash
fly secrets set APP_KEY=$(php artisan key:generate --show)
```

#### 4. Push live:

```Bash
fly deploy --no-cache
```

## 🤖 Automated CI/CD Pipeline
The project features a Git-driven automation engine located at `.github/workflows/fly-deploy.yml`.

### Setup Automated Deployments:

1. Go to your **GitHub Repository -> Settings -> Secrets and variables -> Actions**.

2. Add a new repository secret named `FLY_API_TOKEN` containing your Fly.io account access token.

3. Every subsequent push or merge to the `main` branch will automatically build, optimize, test, and release your app to production seamlessly.

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework and project is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
