# IndieDesk

![IndieDesk Dashboard](docs/screens/dashboard.png)

IndieDesk is a project workspace template built for indie developers.

This is not a SaaS and not a finished product.
It’s a solid Laravel base designed to be adapted to your own workflow.

If you work project by project and often end up rebuilding the same internal tools,
this template is meant to save you time.

---

## What this is

- A project-centric Laravel application
- A starting point, not a locked system
- Code you are expected to read, modify and extend

IndieDesk is opinionated, but intentionally simple.

---

## What’s included

## What’s included

![Project overview](docs/screens/project-overview.png)
![Invoice drafts](docs/screens/invoices.png)
![Project stats](docs/screens/stats.png)

- Projects
- Tasks (with labels & status)
- Documents per project
- Invoice drafts
- Costs & payments tracking
- Project statistics (monthly / yearly)
- AI chat with project context
- Clean, documented Laravel structure

---

## Tech stack

- Laravel
- Blade
- Tailwind CSS
- Alpine.js
- MySQL / SQLite


---

## Getting started

### Requirements

- PHP 8.3+
- Composer
- Node.js
- MySQL or SQLite

### Setup

```bash
composer install
npm install
npm run build

cp .env.example .env
php artisan key:generate
php artisan migrate