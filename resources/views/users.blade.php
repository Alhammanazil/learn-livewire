<div>
    <!DOCTYPE html>
    <html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>{{ $title ?? 'Users' }}</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=inter:400,500,600" rel="stylesheet" />

        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body>
        <div class="mx-auto max-w-6xl px-4 pb-4 md:px-6 mb-4">
            {{-- Header --}}
            <div class="mt-4 mb-6 text-center md:mb-10">
                <h1 class="text-2xl font-semibold text-neutral-900">Users</h1>
                <p class="mt-1 text-sm text-neutral-500">Create a new user and browse the list.</p>
            </div>

            {{-- Two columns --}}
            <div class="grid grid-cols-1 gap-8 md:grid-cols-2">

                {{-- User Registration Form --}}
                @livewire('user-register-form')

                {{-- User List --}}
                @livewire('user-list', ['lazy' => true])
            </div>
        </div>
    </body>

    </html>
</div>
