# Portfolio — Full-Stack Engineer Portfolio Platform

A premium full-stack portfolio platform built with **Vue 3 + Pinia + Tailwind** on the front and **Laravel 11 + Sanctum + MySQL** on the back. Includes a dynamic admin dashboard for managing every section of the public site.

---

## Architecture

```
Portfolio/
├── backend/                       # Laravel 11 API
│   ├── app/
│   │   ├── Http/
│   │   │   ├── Controllers/
│   │   │   │   ├── Api/           # Public REST endpoints
│   │   │   │   └── Admin/         # Authenticated admin endpoints
│   │   │   ├── Middleware/
│   │   │   ├── Requests/          # Form request validation
│   │   │   └── Resources/         # API JSON resources
│   │   ├── Models/                # Eloquent models
│   │   ├── Repositories/          # Data access layer (interface + impl)
│   │   ├── Services/              # Business / domain services
│   │   └── Providers/
│   ├── bootstrap/app.php          # Laravel 11 app bootstrap
│   ├── config/                    # cors.php, sanctum.php …
│   ├── database/
│   │   ├── migrations/            # Schema (14 tables)
│   │   ├── seeders/
│   │   └── factories/
│   ├── routes/api.php             # Versioned /api/v1 routes
│   ├── composer.json
│   └── .env.example
│
└── frontend/                      # Vue 3 SPA
    ├── src/
    │   ├── assets/styles/main.css # Tailwind layers + design tokens
    │   ├── components/
    │   │   ├── ui/                # Buttons, cards, skeletons
    │   │   ├── sections/          # Hero, About, Skills, …
    │   │   └── admin/             # Sidebar, datatables, forms
    │   ├── composables/           # useApi, useSeo, useTyping
    │   ├── layouts/               # PublicLayout, AdminLayout
    │   ├── router/                # Routes + guards
    │   ├── services/              # http.js (axios), api.js
    │   ├── stores/                # auth, theme, portfolio
    │   ├── views/
    │   │   ├── public/            # Home, Projects, Blog, …
    │   │   └── admin/             # Dashboard, all CRUD views
    │   └── main.js
    ├── index.html
    ├── tailwind.config.js
    ├── vite.config.js
    └── package.json
```

### Backend layers
- **Controllers** stay thin — request validation in form requests, JSON shaping in resources, business logic in services, persistence in repositories.
- **Sanctum (cookie / SPA mode)** for stateful admin auth — no token storage in localStorage.
- **CORS + CSRF**: pre-configured for `localhost:5173` (Vite dev) ↔ `localhost:8000` (Laravel).
- **`admin` middleware alias** restricts admin endpoints to users with `role = admin`.

### Frontend layers
- **`services/http.js`** — single axios instance, withCredentials, automatic CSRF cookie fetch, 401 → logout event.
- **`services/api.js`** — typed-shape API surface (`publicApi`, `authApi`, `adminApi`).
- **Pinia stores** — `auth` (session), `theme` (light/dark/system), `portfolio` (cached public data).
- **Router guards** — `requiresAdmin` and `guestOnly` meta flags.
- **Composables** — `useApi` (loading/error/data triple), `useSeo` (meta tags), `useTyping` (animated typing).
- **Tailwind** — custom `brand` / `accent` / `ink` palettes, glass / glow / shimmer utilities, `dark:` class strategy.

---

## Database schema

| Table | Purpose |
|---|---|
| `users` | Admin accounts (role = admin) |
| `personal_access_tokens` | Sanctum |
| `profile` | Singleton row: bio, avatar, CV, stats, typing phrases, education JSON |
| `categories` | Polymorphic by `type` (`blog` \| `project`) |
| `tags` | Shared between blogs & projects via pivots |
| `skills` | Categorised (frontend / backend / database / devops / support) with proficiency |
| `experiences` | Work timeline with technologies + highlights JSON |
| `projects` + `project_images` + `project_tag` | Portfolio with gallery & tags |
| `services` | Offerings with feature list + starting price |
| `testimonials` | Client reviews with rating |
| `blogs` + `blog_tag` | Articles with SEO meta, status workflow, reading time |
| `contacts` | Inbox: read/unread/archive flags |
| `social_links` | GitHub, LinkedIn, etc. |
| `settings` | Key/value site settings (cached) |

---

## Setup — local development

### Prerequisites
- PHP **8.2+** with `pdo_mysql`, `mbstring`, `openssl`, `fileinfo`, `gd`
- Composer 2.x
- Node 20+ and npm
- MySQL 8.x

### 1. Backend

```bash
cd Portfolio/backend

# First-time scaffold (creates the bits Laravel 11 ships with that aren't in this repo)
composer create-project laravel/laravel . --prefer-dist --no-install
# When prompted whether to overwrite existing files, answer NO — your custom files stay.

composer install
cp .env.example .env
php artisan key:generate
php artisan storage:link

# Configure DB in .env, then:
php artisan migrate

# Sanctum (already required in composer.json)
php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"

# Start the API
php artisan serve  # http://localhost:8000
```

> The `composer create-project` step is only needed if you don't already have a Laravel skeleton. If you cloned this repo fresh you may already have `artisan`, `public/index.php`, etc. from a prior install — skip the create-project line in that case.

### 2. Frontend

```bash
cd Portfolio/frontend
cp .env.example .env
npm install
npm run dev   # http://localhost:5173
```

The Vite dev server proxies `/api`, `/sanctum`, and `/storage` to `http://localhost:8000`, so the SPA can use cookie-based Sanctum auth without CORS pain.

### 3. Admin user

After Phase 2 lands the auth controller + seeder you'll get one via:

```bash
php artisan db:seed --class=AdminUserSeeder
# or
php artisan tinker
> \App\Models\User::create(['name'=>'Admin','email'=>'admin@local.test','password'=>'change-me','role'=>'admin']);
```

---

## API surface (versioned `/api/v1`)

### Public
| Method | Endpoint | Purpose |
|---|---|---|
| GET  | `/home`               | Aggregated landing-page payload (profile + featured projects + recent blogs + …) |
| GET  | `/profile`            | Profile singleton |
| GET  | `/skills`             | Skill list (active, ordered) |
| GET  | `/experiences`        | Experience timeline |
| GET  | `/services`           | Active services |
| GET  | `/services/{slug}`    | Service detail |
| GET  | `/projects`           | Filter/search/paginate (`?q=`, `?category=`, `?tag=`, `?featured=`) |
| GET  | `/projects/featured`  | Featured-only |
| GET  | `/projects/{slug}`    | Project detail incl. images & tags |
| GET  | `/testimonials`       | Published testimonials |
| GET  | `/blogs`              | Published blogs (paginated) |
| GET  | `/blogs/recent`       | Recent posts |
| GET  | `/blogs/{slug}`       | Article + increments `views` |
| GET  | `/social-links`       | Active social links |
| POST | `/contact`            | Submit contact form (rate-limited 5/min) |
| POST | `/auth/login`         | Sanctum cookie session |

### Admin (`auth:sanctum` + `admin` middleware)
| Method | Endpoint | |
|---|---|---|
| GET    | `/admin/me`                | Current admin |
| POST   | `/admin/auth/logout`       | |
| GET    | `/admin/dashboard`         | Counts + analytics |
| RESOURCE | `/admin/profile`         | Singleton: show/update + `/avatar`, `/cv` upload |
| RESOURCE | `/admin/skills`          | apiResource |
| RESOURCE | `/admin/experiences`     | apiResource |
| RESOURCE | `/admin/projects`        | apiResource + `/images` add/delete |
| RESOURCE | `/admin/services`        | apiResource |
| RESOURCE | `/admin/testimonials`    | apiResource |
| RESOURCE | `/admin/blogs`           | apiResource |
| RESOURCE | `/admin/social-links`    | apiResource |
| GET/PATCH/DELETE | `/admin/contacts`  | List, show, mark-read, archive, delete |

---

## Build phases

| Phase | What's in it | Status |
|---|---|---|
| 1 | Architecture, schema, models, routes, scaffolding | **✅ this commit** |
| 2 | Auth + all REST controllers + form requests + API resources + service/repo layer + file uploads | ⏭ next |
| 3 | Public Vue site: Hero, About, Skills, Experience, Projects (filter/search/detail), Services, Testimonials, Blog, Contact — animations, dark mode, glassmorphism | ⏭ |
| 4 | Admin dashboard: login, sidebar layout, all CRUD modules, analytics cards | ⏭ |
| 5 | Deployment guide (Nginx + PHP-FPM + MySQL, env hardening, build pipeline) + final polish | ⏭ |

---

## Security checklist

- [x] Sanctum SPA mode (HttpOnly cookies, no JWT in JS)
- [x] CSRF via `XSRF-TOKEN` cookie + `withXSRFToken: true`
- [x] CORS locked to frontend URL from `.env`
- [x] `admin` middleware on all write endpoints
- [x] Contact form rate-limited (`throttle:5,1`)
- [x] Login rate-limited (`throttle:6,1`)
- [ ] File-upload MIME + size validation _(Phase 2)_
- [ ] Image optimisation via Intervention _(Phase 2)_

---

## License

MIT
