<div align="center">
    <img src="https://files.svgcdn.io/devicon/livewire.png" alt="Livewire Logo" width="60" height="60" />
</div>
<h1 align="center">Livewire</h1>
<p align="left">A concise <strong>Laravel 12 + Livewire v3</strong> portfolio application demonstrating user management (create + avatar upload + live search & pagination), a contact form, and a cohesive neutral UI.</p>

<p align="center">
	<img src="public/storage/images/screenshot.png" alt="Application Preview" width="860" />
</p>

## Key Features

- Live (debounced) search + server pagination
- Avatar upload with temporary preview & validation
- Decoupled components: form emits events, list listens
- Contact form using a dedicated form object + flash messaging
- Shared layout, consistent design tokens, basic SEO meta tags (OG + Twitter)

## Quick Start

```bash
git clone https://github.com/Alhammanazil/learn-livewire.git
cd belajar-livewire
cp .env.example .env
php artisan key:generate
touch database/database.sqlite
php artisan migrate --seed && php artisan storage:link
npm install && npm run build
php artisan serve
```

## Deployment Notes

Use Railway / Render / Forge (with MySQL or PostgreSQL) for a live demo. Vercel is suitable only for a static marketing page—include screenshots and (optionally) a short screencast if you cannot host the PHP runtime.

## Core Structure

-   `app/Livewire/UserRegisterForm.php` – user creation + avatar upload
-   `app/Livewire/UserList.php` – paginated searchable list
-   `resources/views/components/layouts/app.blade.php` – global layout & meta tags

## License

MIT. Feel free to extend or adapt.
