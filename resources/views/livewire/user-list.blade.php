        <div wire:poll.visible class="rounded-xl border border-neutral-200 bg-white p-6 shadow-sm">
            <h2 class="mb-4 text-center text-lg font-medium text-neutral-900">Users List</h2>
            <div class="mb-4">
                <form wire:submit.prevent="submitSearch" class="relative">
                    <span class="pointer-events-none absolute inset-y-0 start-0 flex items-center ps-3">
                        <svg class="h-4 w-4 text-neutral-500" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 20 20" aria-hidden="true">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </span>
                    <input type="search" id="default-search" wire:model.live.debounce.250ms="search"
                        class="block w-full rounded-md border border-neutral-300 bg-white ps-10 pe-28 py-2.5 text-sm text-neutral-900 shadow-sm focus:border-neutral-900 focus:outline-none focus:ring-2 focus:ring-neutral-900"
                        placeholder="Search users by name or email..." />
                    <button type="submit"
                        class="absolute end-1.5 bottom-1.5 rounded-md bg-neutral-900 px-3 py-1.5 text-sm font-medium text-white shadow-sm hover:bg-neutral-800">
                        Search
                    </button>
                </form>
            </div>

            <ul role="list" class="divide-y divide-neutral-200">
                @forelse ($this->users as $user)
                    <li class="flex items-center justify-between gap-4 py-3">
                        <div class="flex min-w-0 items-center gap-3">
                            @if ($user->avatar)
                                <img src="{{ asset('storage/' . $user->avatar) }}" alt="{{ $user->name }}"
                                    class="h-9 w-9 flex-none rounded-full object-cover" />
                            @else
                                <div
                                    class="flex h-9 w-9 flex-none items-center justify-center rounded-full bg-neutral-200 text-[11px] font-medium text-neutral-600">
                                    {{ strtoupper(substr($user->name, 0, 1)) }}
                                </div>
                            @endif
                            <div class="min-w-0">
                                <p class="truncate text-sm font-medium text-neutral-900">{{ $user->name }}</p>
                                <p class="truncate text-xs text-neutral-500">{{ $user->email }}</p>
                            </div>
                        </div>
                        <div class="hidden shrink-0 text-xs text-neutral-500 sm:block">Joined
                            {{ $user->created_at->diffForHumans() }}</div>
                    </li>
                @empty
                    <li class="py-10 text-center text-sm text-neutral-500">Belum ada user.</li>
                @endforelse
            </ul>

            <div class="mt-4">
                {{ $this->users->links() }}
            </div>
        </div>
