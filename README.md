# ListingHub

A modern job listing platform built with **Laravel 12**, **Tailwind CSS 4**, and **Vite**. Features a public job board, user dashboard, full admin panel, and a REST API with Laravel Sanctum authentication.

## Features

### Public
- **Job Board** — Browse all listings with pagination, category info, and company details
- **Job Detail** — Full description, salary, poster info, category
- **About & Contact** — Static informational pages

### User Features
- **Registration & Login** — Standard email/password authentication
- **Social Login** — Sign in with Google or GitHub (via Laravel Socialite)
- **User Dashboard** (`/my`) — Personal area with listings overview and stats
- **Job Management** — Create, edit, and delete your own job listings
- **Company Name** — Optionally attach a company name (falls back to your full name)

### Admin Panel (`/admin`)
Login via the separate portal at `/admin.php`.

- **Dashboard** — Stat cards showing total jobs, users, and admins
- **Job Management** — View all listings in a table, edit, and delete with inline dropdown actions
- **User Management** — Tabbed view (Regular Users / Admins), edit profiles, reset passwords, delete users
- **Category Management** — Full CRUD for job categories (Web Dev, Data Science, DevOps, etc.)

### REST API
Powered by Laravel Sanctum (Bearer token auth).

| Endpoint | Method | Description |
|---|---|---|
| `/api/register` | POST | Register a new user |
| `/api/login` | POST | Login & get token |
| `/api/logout` | POST | Revoke token (auth) |
| `/api/user` | GET | Current user (auth) |
| `/api/jobs` | GET | List all jobs |
| `/api/jobs/{id}` | GET | Single job detail |
| `/api/jobs` | POST | Create a job (auth) |
| `/api/jobs/{id}` | PATCH | Update a job (auth) |
| `/api/jobs/{id}` | DELETE | Delete a job (auth) |
| `/api/categories` | GET | List categories |
| `/api/categories/{id}` | GET | Single category |
| `/api/my/stats` | GET | User dashboard stats (auth) |
| `/api/my/jobs` | GET | User's own jobs (auth) |

API documentation is available at `/docs/api`.

### Design
- **Dark mode** throughout — all views support dark/light toggling with a theme switcher in the admin header
- **Teal accent** (teal-600) — consistent color scheme across buttons, badges, borders, and hover states
- **Responsive** — works on mobile, tablet, and desktop
- **Tailwind-styled pagination** — custom Tailwind pagination view

## Tech Stack

- **Backend:** Laravel 12, PHP 8.2+
- **Frontend:** Tailwind CSS 4, Vite, Alpine-style JS
- **Database:** MySQL (configurable via `.env`)
- **Auth:** Laravel Auth + Sanctum (API tokens) + Socialite (Google/GitHub)
- **Build:** Vite + `@tailwindcss/vite` plugin + `laravel-vite-plugin`

## Requirements

- PHP 8.2+
- Composer 2.x
- Node.js 20+ / npm
- MySQL 8.0+ (or compatible database)
- A queue driver (database recommended — `php artisan queue:table`)

## Installation

```bash
# 1. Clone the repository
git clone <repo-url> listinghub
cd listinghub

# 2. Install PHP dependencies
composer install

# 3. Environment setup
cp .env.example .env
php artisan key:generate

# 4. Configure your database in .env
#    DB_CONNECTION=mysql
#    DB_HOST=127.0.0.1
#    DB_PORT=3306
#    DB_DATABASE=listinghub
#    DB_USERNAME=root
#    DB_PASSWORD=

# 5. Run migrations and seed
php artisan migrate
php artisan db:seed --class=CategorySeeder

# 6. Install & build frontend assets
npm install
npm run build

# 7. Create an admin user (via tinker or register, then set is_admin=1 in DB)
```

### Quick Start (one command)

```bash
composer run setup
```

This runs `composer install`, copies `.env.example`, generates a key, runs migrations, installs npm deps, and builds assets.

### Development Server

```bash
composer run dev
```

Runs the PHP server, queue worker, log watcher, and Vite dev server concurrently.

## Default Admin Credentials

```
Email:    admin@admin.com
Password: 12345
```

(Seed this user manually or via a custom seeder — ensure `is_admin` is set to `1`.)

## Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── AuthController.php          # Web auth + social login
│   │   ├── JobController.php           # Public job CRUD
│   │   ├── UserDashboardController.php # User panel (/my)
│   │   ├── DocsController.php          # API docs page
│   │   ├── Admin/
│   │   │   ├── DashboardController.php
│   │   │   ├── JobController.php
│   │   │   ├── UserController.php
│   │   │   └── CategoryController.php
│   │   └── Api/
│   │       ├── AuthController.php
│   │       ├── JobController.php
│   │       ├── CategoryController.php
│   │       └── UserController.php
│   ├── Middleware/
│   │   ├── AdminMiddleware.php
│   │   ├── AdminAuthenticate.php
│   │   └── CheckUserActivity.php
│   └── Requests/
│       └── Api/                         # Form request validation
├── Models/
│   ├── User.php
│   ├── Job.php                          # Table: job_listings
│   └── Category.php
└── Providers/
    └── AppServiceProvider.php           # Pagination defaults
database/
├── migrations/                           # 10 migration files
└── seeders/
    ├── DatabaseSeeder.php
    └── CategorySeeder.php                # 8 default categories
resources/views/
├── components/
│   ├── layout.blade.php                  # Public layout
│   ├── admin-layout.blade.php            # Admin layout (sidebar + topbar)
│   ├── header/                           # Navbar, login/register, logo
│   ├── button/                           # Button components
│   └── footer.blade.php
├── pages/                                # Public pages
├── user/                                 # User dashboard views
├── admin/                                # Admin views
│   ├── dashboard.blade.php
│   ├── jobs/
│   ├── users/
│   └── categories/
└── docs/
    └── api.blade.php                     # API documentation
routes/
├── web.php                               # Web routes
└── api.php                                # API routes (prefix: /api)
```

## Updating an Existing Project

If you've already cloned and configured the project, just:

```bash
git pull
composer install
php artisan migrate
npm install
npm run build
```

## Testing

```bash
composer run test
```

This clears the config cache and runs the PHPUnit test suite.

## License

[MIT](LICENSE.md)
