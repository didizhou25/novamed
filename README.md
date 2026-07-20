# NovaMed Research Foundation

Marketing/informational website for NovaMed Research Foundation, an independent medical research foundation. Built with Laravel 13, Blade views, and Tailwind CSS v4 (via Vite).

## Stack

- PHP 8.3+, Laravel 13
- SQLite by default (swap to MySQL/Postgres in `.env` if preferred)
- Tailwind CSS v4 + Vite for the frontend build
- Plain Blade views (no JS framework) with a small vanilla-JS mobile menu toggle

## Pages

| Route | Description |
|---|---|
| `/` | Home |
| `/over-ons` | Missie, visie, kernwaarden |
| `/onderzoek` | Bedrijfsmodel, onderzoeksgebieden, onderzoeksopzet |
| `/toekomst` | Langetermijndoelen |
| `/contact` | Contactformulier (algemeen / donateur / vrijwilliger / partner) |

The contact form validates input, blocks bot submissions via a honeypot field, stores each submission in the `contact_submissions` table, and emails a notification to `MAIL_FROM_ADDRESS` using the configured mailer.

## Local development

```bash
composer install
npm install

cp .env.example .env
php artisan key:generate

touch database/database.sqlite   # if using the default sqlite connection
php artisan migrate

npm run dev        # Vite dev server, in one terminal
php artisan serve  # in another terminal
```

## Production deployment

1. **Get the code onto the server** (git pull, deploy tool, etc.) and set the document root to the `public/` directory — never expose the project root.

2. **Install dependencies without dev tooling:**
   ```bash
   composer install --no-dev --optimize-autoloader
   npm ci
   npm run build
   ```

3. **Configure the environment.** Copy `.env.example` to `.env` and set at minimum:
   - `APP_ENV=production`, `APP_DEBUG=false`
   - `APP_URL` to the real domain (used for absolute URLs, e.g. in emails)
   - `APP_KEY` — generate with `php artisan key:generate` if not already set
   - A real database connection (`DB_CONNECTION`, `DB_HOST`, `DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`) if not using SQLite
   - `MAIL_MAILER` and SMTP credentials so the contact form notification actually sends (defaults to `log`, which only writes to `storage/logs/laravel.log`)
   - `MAIL_FROM_ADDRESS` — this is also the inbox that receives contact form notifications

4. **Run migrations:**
   ```bash
   php artisan migrate --force
   ```

5. **Cache the framework for performance:**
   ```bash
   php artisan config:cache
   php artisan route:cache
   php artisan view:cache
   php artisan event:cache
   ```
   Re-run these (or `php artisan optimize:clear` then `php artisan optimize`) after every deploy that changes config, routes, or views.

6. **Permissions:** ensure the web server user can write to `storage/` and `bootstrap/cache/`.

7. **HTTPS:** terminate TLS at the load balancer/reverse proxy or web server, and set `APP_URL` to the `https://` URL so generated links and the CSRF-protected cookie behave correctly.

## Notes

- No admin/CMS is included — page content lives directly in the Blade views under `resources/views/pages`. Ask for a CMS/admin layer if content needs to change without a code deploy.
- The default Laravel `users`/auth scaffolding is present but unused; no login is wired up.
