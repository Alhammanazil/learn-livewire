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
