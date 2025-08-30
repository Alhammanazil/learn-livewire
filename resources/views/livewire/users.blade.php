<div>
    <div
        class="max-w-4xl mx-auto mt-10 mb-16 overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-[0_10px_30px_rgba(0,0,0,0.06)]">
        {{-- Header --}}
        <div
            class="flex flex-col gap-2 border-b border-gray-100 px-8 pt-7 pb-5 md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-2xl font-semibold text-gray-900">Users</h2>
                <p class="mt-1 text-sm text-gray-500">
                    Create and manage users for your app.
                </p>
            </div>

            {{-- Button --}}
            <div class="flex items-center gap-3">
                @if (!$showForm)
                    <button wire:click="showFormPanel"
                        class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 active:scale-[0.99]">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                            stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        Create User
                    </button>
                @else
                    <button wire:click="hideFormPanel"
                        class="inline-flex items-center gap-2 rounded-lg border border-gray-300 bg-white px-4 py-2 text-sm font-medium text-gray-700 hover:bg-gray-50 active:scale-[0.99]">
                        Cancel
                    </button>
                @endif

                @if ($showTable)
                    <button wire:click="hideUsers"
                        class="inline-flex items-center gap-2 rounded-lg bg-gray-900 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-800 active:scale-[0.99]">
                        Hide Users
                    </button>
                @else
                    <button wire:click="showUsers"
                        class="inline-flex items-center gap-2 rounded-lg bg-gray-900 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-800 active:scale-[0.99]">
                        Show Users
                    </button>
                @endif
            </div>
        </div>

        {{-- Flash success --}}
        @if (session('success'))
            <div class="mx-8 mt-5 rounded-lg border border-green-200 bg-green-50 px-4 py-3 text-green-800">
                {{ session('success') }}
            </div>
        @endif

        {{-- FORM --}}
        @if ($showForm)
            <div class="px-8 py-7">
                <form wire:submit.prevent="storeUser" class="grid grid-cols-1 gap-6 md:grid-cols-2">
                    {{-- Name --}}
                    <div class="md:col-span-2">
                        <label for="name" class="block text-sm font-medium text-gray-700">Name</label>
                        <input id="name" type="text" wire:model.defer="name" @class([
                            'mt-1 block w-full rounded-xl border bg-white px-3 py-2 text-gray-900 shadow-sm transition focus:outline-none focus:ring-2',
                            'border-gray-300 focus:border-gray-900 focus:ring-gray-900' => !$errors->has(
                                'name'),
                            'border-red-500 focus:border-red-600 focus:ring-red-600' => $errors->has(
                                'name'),
                        ])
                            placeholder="Your Name Here" aria-invalid="{{ $errors->has('name') ? 'true' : 'false' }}" />
                        <p class="mt-1 text-xs text-gray-500">Minimal 3 karakter.</p>
                        @error('name')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Email --}}
                    <div class="md:col-span-1">
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input wire:model.defer="email" id="email" type="email" @class([
                            'mt-1 block w-full rounded-xl border bg-white px-3 py-2 text-gray-900 shadow-sm transition focus:outline-none focus:ring-2',
                            'border-gray-300 focus:border-gray-900 focus:ring-gray-900' => !$errors->has(
                                'email'),
                            'border-red-500 focus:border-red-600 focus:ring-red-600' => $errors->has(
                                'email'),
                        ])
                            placeholder="Your Email Here" />
                        <p class="mt-1 text-xs text-gray-500">Pastikan email unik.</p>
                        @error('email')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Password --}}
                    <div class="md:col-span-1">
                        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                        <input id="password" type="password" wire:model.defer="password" @class([
                            'mt-1 block w-full rounded-xl border bg-white px-3 py-2 text-gray-900 shadow-sm transition focus:outline-none focus:ring-2',
                            'border-gray-300 focus:border-gray-900 focus:ring-gray-900' => !$errors->has(
                                'password'),
                            'border-red-500 focus:border-red-600 focus:ring-red-600' => $errors->has(
                                'password'),
                        ])
                            placeholder="Your Password Here" />
                        <p class="mt-1 text-xs text-gray-500">Minimal 6 karakter.</p>
                        @error('password')
                            <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Actions --}}
                    <div class="md:col-span-2 flex items-center justify-between pt-2">
                        <div class="text-xs text-gray-500">Tip: tekan <kbd class="rounded border px-1">Enter</kbd> untuk
                            menyimpan.</div>

                        <button type="submit"
                            class="inline-flex items-center gap-2 rounded-lg bg-gray-900 px-4 py-2 text-sm font-semibold text-white hover:bg-gray-800 disabled:cursor-not-allowed disabled:opacity-60"
                            wire:loading.attr="disabled" wire:target="storeUser">
                            <svg wire:loading wire:target="storeUser" xmlns="http://www.w3.org/2000/svg"
                                class="h-4 w-4 animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path class="opacity-25" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M12 4v2m0 12v2m8-8h-2M6 12H4m12.364 6.364l-1.414-1.414M7.05 7.05L5.636 5.636m12.728 0l-1.414 1.414M7.05 16.95l-1.414 1.414" />
                            </svg>
                            Save
                        </button>
                    </div>
                </form>
            </div>
        @endif

        {{-- TABLE --}}
        @if ($showTable)
            <div class="px-8 pb-8">
                <div class="overflow-hidden rounded-xl border border-gray-200">
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Name</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Email</th>
                                <th
                                    class="px-6 py-3 text-left text-xs font-medium uppercase tracking-wider text-gray-500">
                                    Created</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-gray-100 bg-white">
                            @forelse ($users as $user)
                                <tr class="hover:bg-gray-50/60">
                                    <td class="whitespace-nowrap px-6 py-4 font-medium text-gray-900">
                                        {{ $user->name }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-gray-600">{{ $user->email }}</td>
                                    <td class="whitespace-nowrap px-6 py-4 text-gray-500">
                                        {{ $user->created_at->diffForHumans() }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-8 text-center text-gray-500">Belum ada user.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
</div>
