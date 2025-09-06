    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="h-full bg-neutral-50">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $title ? $title . ' • Livewire Demo' : 'Livewire Demo' }}</title>
        <meta name="description"
            content="Modern Laravel Livewire demo showcasing reactive components, pagination, file upload & clean UI." />
        <meta name="keywords" content="Laravel, Livewire, PHP, Tailwind, Demo, Portfolio" />
        <meta property="og:title" content="{{ $title ? $title . ' • Livewire Demo' : 'Livewire Demo' }}" />
        <meta property="og:description"
            content="Interactive Livewire demo application – users CRUD, search, upload & more." />
        <meta property="og:type" content="website" />
        <meta property="og:url" content="{{ url()->current() }}" />
        <meta property="og:image"
            content="https://raw.githubusercontent.com/livewire/livewire/main/art/readme_logo.png" />
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:title" content="Livewire Demo" />
        <meta name="twitter:description"
            content="Interactive Livewire demo application – users CRUD, search, upload & more." />
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600" rel="stylesheet" />
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="flex min-h-screen flex-col font-sans antialiased text-neutral-800">
        {{-- Top Navigation --}}
        <nav
            class="fixed inset-x-0 top-0 z-40 border-b border-neutral-200 bg-white/90 backdrop-blur supports-[backdrop-filter]:bg-white/70">
            <div class="mx-auto grid max-w-7xl grid-cols-3 items-center gap-4 px-4 py-3 md:gap-6 md:px-6">
                {{-- Left: Logo --}}
                <div class="flex items-center">
                    <a href="/" class="flex items-center gap-2 font-medium text-neutral-900">
                        <img src="https://files.svgcdn.io/devicon/livewire.png" class="h-7 w-auto" alt="Logo" />
                        <span class="hidden text-sm font-semibold tracking-tight sm:inline">Livewire</span>
                    </a>
                </div>
                {{-- Center: Menu --}}
                <div class="flex items-center justify-center">
                    <ul class="flex items-center gap-1 text-sm font-medium">
                        @php($links = [['href' => '/', 'label' => 'Home'], ['href' => '/users', 'label' => 'Users'], ['href' => '/about', 'label' => 'About'], ['href' => '/contacts', 'label' => 'Contact']])
                        @foreach ($links as $item)
                            @php($active = request()->is(trim($item['href'], '/')) || ($item['href'] === '/' && request()->path() === '/'))
                            <li>
                                <a href="{{ $item['href'] }}" @class([
                                    'rounded-md px-3 py-2 transition',
                                    'bg-neutral-900 text-white shadow-sm' => $active,
                                    'text-neutral-600 hover:text-neutral-900 hover:bg-neutral-100' => !$active,
                                ])>{{ $item['label'] }}</a>
                            </li>
                        @endforeach
                    </ul>
                </div>
                {{-- Right: Actions --}}
                <div class="hidden items-center justify-end gap-3 md:flex">
                    <a href="https://livewire.laravel.com" target="_blank" rel="noopener"
                        class="rounded-md border border-neutral-300 bg-white px-3 py-2 text-xs font-medium text-neutral-700 shadow-sm hover:bg-neutral-100">Docs</a>
                    <a href="https://github.com/livewire/livewire" target="_blank" rel="noopener"
                        class="rounded-md bg-neutral-900 px-3 py-2 text-xs font-semibold text-white shadow-sm hover:bg-neutral-800">GitHub</a>
                </div>
            </div>
        </nav>

        <main class="flex-1 pt-24">
            {{ $slot }}
        </main>

        <footer class="mt-12 border-t border-neutral-200 bg-white/60 py-4 text-center text-[11px] text-neutral-500">
            <p>© {{ date('Y') }} Livewire Demo UI. Built with Laravel & Livewire.</p>
        </footer>
    </body>

    </html>
