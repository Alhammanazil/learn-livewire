<section class="mx-auto max-w-4xl px-4 md:px-6">
    <div class="mx-auto max-w-2xl text-center">
        <h1 class="text-balance text-4xl font-semibold tracking-tight text-neutral-900 md:text-5xl">Contact Us</h1>
        <p class="mt-4 text-pretty text-sm leading-6 text-neutral-600 md:text-base">Questions, feedback or collaboration
            ideas? Drop us a line below and we’ll get back to you.</p>
    </div>

    @if (session('success'))
        <div class="mt-10 rounded-md border border-green-200 bg-green-50 px-4 py-3 text-sm text-green-800">
            <span class="font-medium">Success:</span> {{ session('success') }}
        </div>
    @endif

    <form wire:submit.prevent="createNewMessage" class="mt-10 space-y-6">
        <div class="grid gap-6 md:grid-cols-2">
            <div class="md:col-span-1">
                <label for="email" class="block text-sm font-medium text-neutral-700">Your email</label>
                <input wire:model="form.email" id="email" type="email" placeholder="you@example.com"
                    class="mt-1 block w-full rounded-md border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900 shadow-sm focus:border-neutral-900 focus:outline-none focus:ring-2 focus:ring-neutral-900" />
                @error('form.email')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>
            <div class="md:col-span-1">
                <label for="subject" class="block text-sm font-medium text-neutral-700">Subject</label>
                <input wire:model="form.subject" id="subject" type="text" placeholder="How can we help?"
                    class="mt-1 block w-full rounded-md border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900 shadow-sm focus:border-neutral-900 focus:outline-none focus:ring-2 focus:ring-neutral-900" />
                @error('form.subject')
                    <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>
        <div>
            <label for="message" class="block text-sm font-medium text-neutral-700">Message</label>
            <textarea wire:model="form.message" id="message" rows="6" placeholder="Leave a message..."
                class="mt-1 block w-full resize-y rounded-md border border-neutral-300 bg-white px-3 py-2 text-sm text-neutral-900 shadow-sm focus:border-neutral-900 focus:outline-none focus:ring-2 focus:ring-neutral-900"></textarea>
            @error('form.message')
                <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex items-center gap-3">
            <button type="submit" wire:loading.attr="disabled" wire:target="createNewMessage"
                class="inline-flex items-center gap-2 rounded-md bg-neutral-900 px-4 py-2 text-sm font-medium text-white shadow-sm transition hover:bg-neutral-800 disabled:cursor-not-allowed disabled:opacity-60">
                <svg wire:loading wire:target="createNewMessage" class="h-4 w-4 animate-spin" fill="none"
                    stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" aria-hidden="true">
                    <path stroke-linecap="round" stroke-linejoin="round"
                        d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                </svg>
                <span wire:loading.remove wire:target="createNewMessage">Send message</span>
                <span wire:loading wire:target="createNewMessage">Sending...</span>
            </button>
            <p class="text-xs text-neutral-500">We typically respond within 1–2 business days.</p>
        </div>
    </form>
</section>
