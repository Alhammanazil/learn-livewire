        <div class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm">
            <div class="mb-6 text-center">
                <h2 class="text-lg font-medium text-neutral-900">Create New User</h2>
                <p class="mt-1 text-xs text-neutral-500">Add a user with secure password & optional avatar.</p>
            </div>

            <form wire:submit.prevent="storeUser" class="space-y-5">
                {{-- Name --}}
                <div>
                    <label for="name" class="block text-sm font-medium text-neutral-700">Name</label>
                    <input id="name" type="text" wire:model.defer="name" @class([
                        'mt-1 block w-full rounded-md border bg-white px-3 py-2 text-sm text-neutral-900 shadow-sm transition focus:outline-none focus:ring-2',
                        'border-neutral-300 focus:border-neutral-900 focus:ring-neutral-900' => !$errors->has(
                            'name'),
                        'border-red-500 focus:border-red-600 focus:ring-red-600' => $errors->has(
                            'name'),
                    ])
                        placeholder="Your Name Here" />
                    @error('name')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Email --}}
                <div>
                    <label for="email" class="block text-sm font-medium text-neutral-700">Email address</label>
                    <input id="email" type="email" wire:model.defer="email" @class([
                        'mt-1 block w-full rounded-md border bg-white px-3 py-2 text-sm text-neutral-900 shadow-sm transition focus:outline-none focus:ring-2',
                        'border-neutral-300 focus:border-neutral-900 focus:ring-neutral-900' => !$errors->has(
                            'email'),
                        'border-red-500 focus:border-red-600 focus:ring-red-600' => $errors->has(
                            'email'),
                    ])
                        placeholder="you@example.com" />
                    @error('email')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Password --}}
                <div>
                    <label for="password" class="block text-sm font-medium text-neutral-700">Password</label>
                    <input id="password" type="password" wire:model.defer="password" @class([
                        'mt-1 block w-full rounded-md border bg-white px-3 py-2 text-sm text-neutral-900 shadow-sm transition focus:outline-none focus:ring-2',
                        'border-neutral-300 focus:border-neutral-900 focus:ring-neutral-900' => !$errors->has(
                            'password'),
                        'border-red-500 focus:border-red-600 focus:ring-red-600' => $errors->has(
                            'password'),
                    ])
                        placeholder="••••••" />
                    @error('password')
                        <p class="mt-1 text-xs text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                {{-- Avatar --}}
                <div>
                    <label for="avatar" class="block text-sm font-medium text-neutral-700">Profile Picture</label>
                    <div class="mt-1 rounded-md border border-dashed border-neutral-300 bg-neutral-50 p-4 text-center">
                        <input id="avatar" type="file" wire:model="avatar"
                            accept="image/png, image/jpeg, image/jpg"
                            class="block w-full text-sm text-neutral-700 file:mr-3 file:rounded-md file:border-0 file:bg-neutral-900 file:px-3 file:py-1.5 file:text-sm file:font-medium file:text-white hover:file:bg-neutral-800" />
                        <p class="mt-2 text-xs text-neutral-500">PNG, JPG up to 5MB</p>
                        @error('avatar')
                            <p class="mt-2 text-xs text-red-600">{{ $message }}</p>
                        @enderror
                        <div class="mt-3 flex items-center justify-center">
                            @if ($avatar)
                                <img src="{{ $avatar->temporaryUrl() }}" alt="Preview"
                                    class="h-14 w-14 rounded-full border border-neutral-200 object-cover">
                            @endif
                        </div>
                    </div>
                </div>

                <button type="submit"
                    class="inline-flex w-full items-center justify-center gap-2 rounded-md bg-neutral-900 px-4 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-neutral-800 disabled:cursor-not-allowed disabled:opacity-60"
                    wire:loading.attr="disabled" wire:target="storeUser">
                    <svg wire:loading wire:target="storeUser" xmlns="http://www.w3.org/2000/svg"
                        class="h-4 w-4 animate-spin" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15" />
                    </svg>
                    <span wire:loading.remove wire:target="storeUser">Create new user</span>
                    <span wire:loading wire:target="storeUser">Creating...</span>
                </button>

                @if (session('success'))
                    <div class="rounded-md border border-green-200 bg-green-50 px-3 py-2 text-sm text-green-800">
                        {{ session('success') }}</div>
                @endif
            </form>
        </div>
