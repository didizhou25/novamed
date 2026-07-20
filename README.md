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

## Deploying to Cloudflare Pages

Cloudflare Pages/Workers has no PHP runtime, so the Laravel app itself can't run there. Instead, `php artisan static:build` renders all five page routes to plain HTML (using the real Blade views, so it stays in sync with the Laravel app) into a `dist/` folder, and a Cloudflare Pages Function (`functions/contact.js`) reimplements the contact form's validation and storage in JavaScript so the form still works on the static export.

**Build locally:**

```bash
npm run build          # compiles CSS/JS into public/build
php artisan static:build   # renders dist/ from the live routes
```

`dist/` is a fully static site (clean URLs, relative asset paths) that can be previewed with any static server or deployed as-is.

**One-time Cloudflare setup:**

1. Create the Pages project: `npx wrangler pages project create novamed-research-foundation` (or via the Cloudflare dashboard).
2. Create a KV namespace for contact submissions: `npx wrangler kv namespace create CONTACT_SUBMISSIONS`, then bind it to the Pages project under **Settings → Functions → KV namespace bindings** (binding name `CONTACT_SUBMISSIONS`).
3. *(Optional)* To also email new submissions, add a [Resend](https://resend.com) API key and set `RESEND_API_KEY`, `CONTACT_NOTIFY_ADDRESS`, and `CONTACT_FROM_ADDRESS` as environment variables/secrets on the Pages project. Without these, submissions are still stored in KV, just not emailed.
4. Add two repo secrets in GitHub (**Settings → Secrets and variables → Actions**): `CLOUDFLARE_API_TOKEN` (a token with Pages edit permission) and `CLOUDFLARE_ACCOUNT_ID`.

**Deploying:** `.github/workflows/deploy.yml` builds and deploys `dist/` to Cloudflare Pages on every push to `main` (PHP is only needed in this GitHub Actions runner — never on Cloudflare's own build image). Trigger it manually from the Actions tab, or just push to `main`.

## Notes

- No admin/CMS is included — page content lives directly in the Blade views under `resources/views/pages`. Ask for a CMS/admin layer if content needs to change without a code deploy.
- The default Laravel `users`/auth scaffolding is present but unused; no login is wired up.
- `resources/js/app.js` submits the contact form via `fetch`, so the exact same Blade form works against both the real Laravel endpoint (`ContactController::store`) and the Cloudflare Pages Function — whichever is serving the page.
