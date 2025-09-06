<section class="mx-auto max-w-5xl px-4 md:px-6">
    <div class="mx-auto max-w-2xl text-center">
        <h1
            class="text-balance bg-gradient-to-b from-neutral-900 to-neutral-700 bg-clip-text text-4xl font-semibold tracking-tight text-transparent md:text-5xl">
            Welcome to Livewire Demo
        </h1>
        <p class="mt-4 text-pretty text-sm leading-6 text-neutral-600 md:text-base">
            Build modern, reactive interfaces with server-driven simplicity. Explore users, send a contact message, or
            learn more about this small demo app.
        </p>
        <div class="mt-8 flex flex-wrap items-center justify-center gap-3">
            <a href="/users"
                class="inline-flex items-center gap-2 rounded-md bg-neutral-900 px-4 py-2 text-sm font-medium text-white shadow-sm transition hover:bg-neutral-800">
                <span>Manage Users</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd"
                        d="M10.293 3.293a1 1 0 011.414 0l5 5a1 1 0 010 1.414l-5 5a1 1 0 01-1.414-1.414L13.586 11H4a1 1 0 110-2h9.586l-3.293-3.293a1 1 0 010-1.414z"
                        clip-rule="evenodd" />
                </svg>
            </a>
            <a href="/contacts"
                class="inline-flex items-center gap-2 rounded-md border border-neutral-300 bg-white px-4 py-2 text-sm font-medium text-neutral-700 shadow-sm transition hover:bg-neutral-100">
                Contact Us
            </a>
            <a href="/about"
                class="inline-flex items-center gap-2 rounded-md border border-neutral-300 bg-white px-4 py-2 text-sm font-medium text-neutral-700 shadow-sm transition hover:bg-neutral-100">
                About
            </a>
        </div>
    </div>

    <div class="mt-16 grid gap-6 md:grid-cols-3">
        <div class="group rounded-lg border border-neutral-200 bg-white p-5 shadow-sm transition hover:shadow-md">
            <h3 class="flex items-center justify-between text-sm font-medium text-neutral-900">Reactive UI
                <span
                    class="rounded-md bg-neutral-900 px-1.5 py-0.5 text-[10px] font-medium tracking-wide text-white">LIVE</span>
            </h3>
            <p class="mt-2 text-xs leading-5 text-neutral-600">Every input you type can update the interface instantly
                without a full page reload.</p>
        </div>
        <div class="group rounded-lg border border-neutral-200 bg-white p-5 shadow-sm transition hover:shadow-md">
            <h3 class="text-sm font-medium text-neutral-900">File Uploads</h3>
            <p class="mt-2 text-xs leading-5 text-neutral-600">Handle avatar uploads with temporary previews and
                validation.</p>
        </div>
        <div class="group rounded-lg border border-neutral-200 bg-white p-5 shadow-sm transition hover:shadow-md">
            <h3 class="text-sm font-medium text-neutral-900">Pagination & Search</h3>
            <p class="mt-2 text-xs leading-5 text-neutral-600">Combine server pagination with instant filtering using
                Livewire.</p>
        </div>
    </div>
</section>
