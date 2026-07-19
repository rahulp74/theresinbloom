# TheResinBloom — Laravel 12

A full Laravel 12 port of the TheResinBloom React storefront: Blade views, MySQL products, session-based cart, WhatsApp checkout, and an admin panel.

## Requirements
- PHP 8.2+
- Composer 2
- MySQL 8 (or MariaDB 10.6+)
- Node.js 20+ (optional — only if you want to recompile Tailwind locally)

## Install

```bash
composer install
cp .env.example .env
php artisan key:generate
# edit .env with your DB credentials + WhatsApp number
php artisan migrate --seed
php artisan storage:link
php artisan serve
```

Visit `http://localhost:8000`.

### Admin

- URL: `/admin/login`
- Email: `admin@theresinbloom.in`
- Password: `password`

Change these immediately in production.

### WhatsApp number

Edit `WHATSAPP_NUMBER` in `.env` (international format, digits only, e.g. `8200758713`).

### Styling

Tailwind is loaded via CDN in `resources/views/layouts/app.blade.php` — no build step needed. The design tokens (parchment/petal/leaf/lavender/ink) are defined inline in the layout's `<script>` tailwind config. To move to a compiled build, run `npm install && npm run build` (see `package.json`).

### Images

Product/hero images live in `public/images/`. Admin uploads go to `storage/app/public/products/` and are served via `php artisan storage:link`.

## Structure

```
app/Http/Controllers/       Storefront controllers
app/Http/Controllers/Admin/ Admin panel
app/Models/                 Product, Category
database/migrations/        Schema
database/seeders/           8 seeded products, 9 categories, admin user
resources/views/            Blade templates
routes/web.php              All routes
```
