# Elektriker Bergmann — Notdienst Landing Page

A single-page marketing site for a 24/7 emergency electrician business in Cologne, Germany, built on Laravel 9. All content is editable from a custom admin dashboard — no code changes needed to update text, images, prices, reviews, or FAQs.

## What this project is

- A **one-page German-electrician landing site** (hero, trust stats, services, 3-step process, about, comparison table, reviews, FAQ, callback form, footer, sticky bottom bar).
- A **content-managed backend**: every section above is backed by a database table and an admin screen, not hardcoded HTML.
- **Trilingual**: German, English, and Arabic. Visitors can switch language; the site falls back gracefully if a language is disabled. Arabic renders right-to-left automatically.
- A **lead-capture form**: the "Rückruf anfordern" (request a callback) form stores submissions in the dashboard under *Callback Leads* — no email/CRM integration required to start using it.

This is not the original template. The project started from a generic multi-page "Elsscuba" scuba-diving demo theme and was rebuilt into this focused single-page electrician site; the old multi-page routes (`/about`, `/services`, `/projects`, `/news`, `/contact`) still resolve as redirects to the homepage so no old bookmarked/indexed links break.

## Tech stack

- **PHP 8.x / Laravel 9**, Blade templates, Eloquent ORM
- **MySQL** database
- **Bootstrap 5** (dashboard), custom CSS (public landing page)
- **Vite** for asset bundling
- Custom JSON-column based translation system (`app/Traits/HasTranslations.php`) — no third-party i18n package

## Requirements

- PHP 8.0.2+
- Composer
- MySQL (or MariaDB)
- Node.js + npm (only needed if you plan to rebuild/change frontend assets via Vite)

## Getting started (local setup, e.g. with XAMPP)

1. **Clone and install dependencies**
   ```bash
   git clone https://github.com/AliabdO065/elec.git
   cd elec
   composer install
   npm install
   ```

2. **Environment file**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Edit `.env` and set your database credentials:
   ```
   DB_DATABASE=elec
   DB_USERNAME=root
   DB_PASSWORD=
   ```

3. **Set an admin password before seeding**
   Add this line to `.env` (pick your own strong password):
   ```
   SEED_ADMIN_PASSWORD=choose-a-strong-password-here
   ```
   The seeder creates the admin account `admin@elektriker-bergmann.de` using this value. If it's left empty, no admin user is created and you won't be able to log in.

4. **Create the database, then migrate and seed**
   ```bash
   php artisan migrate --seed
   ```
   This creates all tables and fills the landing page with placeholder content (stats, services, steps, comparison rows, sample reviews, FAQs) in all 3 languages, ready to be edited from the dashboard.

5. **Build frontend assets** (required on a fresh install — the login page loads its CSS/JS from `public/build`, which isn't committed to git)
   ```bash
   npm run build   # for production
   npm run dev     # alternative for local development (keeps a watcher running)
   ```

6. **Serve the app**
   - Via XAMPP: point a vhost/alias at the project's `public/` folder, or
   - Via the built-in server:
     ```bash
     php artisan serve
     ```

7. **Log in to the dashboard** at `/login` using `admin@elektriker-bergmann.de` and the password you set in step 3.

## Using the dashboard

All content lives under **Admin → Landing Page** in the sidebar:

| Section | Controls |
|---|---|
| **Languages** | Enable/disable German, English, Arabic for visitors. At least one language, and the default language, must always stay enabled. |
| **Settings** | Logo, phone number, hero headline/subheadline/image, alert banner, owner name/photo, company story, trust points, footer company info, legal page links (Impressum/Datenschutz/AGB), and social media links (Facebook/Instagram/Twitter/YouTube — only filled-in links show in the footer). |
| **Trust Stats** | The small stat badges near the top (e.g. "25+ years", icon + value + label). |
| **Services** | The 3 service cards (title, description, icon, image). |
| **3-Step Process** | The "how it works" steps. |
| **Comparison Table** | Rows comparing "us" vs. "anonymous emergency providers". |
| **Reviews** | Customer reviews (name, photo, star rating, date, text). Reviews can be flagged as an example ("Beispiel") until real reviews are collected. |
| **FAQ** | Question/answer pairs shown in the FAQ accordion. |
| **Callback Leads** | Read-only inbox of every callback request submitted through the site's form (name, phone, email, postal code, and what the issue was). |

Every text field that appears on the public site is translatable: content forms accept German, English, and Arabic values, and the site displays whichever the visitor has selected (falling back to German if a translation is missing).

The dashboard's own interface (menus, buttons, labels) has a separate language switcher next to the admin's account menu — it does **not** affect what visitors see, only how the dashboard itself is displayed to whoever is logged in.

## Project structure notes

- `app/Models/Landing*.php` — one model per content-managed section (`LandingSetting`, `LandingStat`, `LandingService`, `LandingStep`, `LandingComparison`, `LandingReview`, `LandingFaq`, `LandingLead`), plus `Language`.
- `app/Http/Controllers/LandingController.php` — public site: renders the homepage, handles callback submissions, handles the visitor language switch.
- `app/Http/Controllers/LandingDashboardController.php` — all admin CRUD for the sections above.
- `app/Traits/HasTranslations.php` — makes a model field transparently read/write per-locale JSON (`{"de":"...","en":"...","ar":"..."}`) without changing how views access it (`$service->title` just works).
- `app/Http/Middleware/SetLocale.php` / `SetAdminLocale.php` — separate locale resolution for visitors vs. logged-in admins.
- `resources/views/fronted/landing/` — the public page, split into one partial per section (`partials/_hero.blade.php`, `_services.blade.php`, etc.).
- `resources/views/dashboard/landing/` — the corresponding admin screens.
- `lang/{de,en,ar}.json` and `lang/{de,ar}/{validation,auth,pagination,passwords}.php` — translation strings for the static site chrome and Laravel's built-in validation/auth messages.

## Security note

Never commit a real `.env` file. `SEED_ADMIN_PASSWORD` should only exist in your local/production `.env`, never in source control — the seeder reads it from the environment specifically so no password is ever hardcoded in the repository.
