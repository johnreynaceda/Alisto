<div>
    <div class="relative flex-shrink-0 ml-5" @click.away="open = false" x-data="{ open: false }">
        <div>
            <button @click="open = !open" type="button relative"
                class="flex bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2"
                id="user-menu-button" aria-expanded="false" aria-haspopup="true">
                <span class="sr-only">
                    Open user menu
                </span>
                {{-- <img class="object-cover w-10 h-10 rounded-full"
                src="https://images.unsplash.com/flagged/photo-1570612861542-284f4c12e75f?ixlib=rb-1.2.1&amp;ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&amp;auto=format&amp;fit=crop&amp;w=2070&amp;q=80"
                alt=""> --}}
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="w-7 h-7 fill-main ">
                    <path
                        d="M20 17H22V19H2V17H4V10C4 5.58172 7.58172 2 12 2C16.4183 2 20 5.58172 20 10V17ZM9 21H15V23H9V21Z">
                    </path>
                </svg>

                <div class="absolute -top-2 -right-4 ">
                    @if ($not_read > 0)
                        <span
                            class="text-xs font-medium bg-red-500 p-0.5 text-white px-2 rounded-full">{{ $not_read }}</span>
                    @endif
                </div>
            </button>
        </div>

        <div x-show="open" x-transition:enter="transition ease-out duration-100"
            x-transition:enter-start="transform opacity-0 scale-95"
            x-transition:enter-end="transform opacity-100 scale-100" x-transition:leave="transition ease-in duration-75"
            x-transition:leave-start="transform opacity-100 scale-100"
            x-transition:leave-end="transform opacity-0 scale-95" style="display: none"
            class="absolute right-0 z-10 w-96 py-1 mt-2 origin-top-right bg-white rounded-md shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none"
            role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            <div class="p-2 px-4">
                <div class="flex justify-between items-center">
                    <h1 class="text-gray-800">Notification</h1>
                    <button class="text-sm" wire:click="readAll">
                        Mark as Read
                    </button>
                </div>
                <ul class="mt-3 space-y-2">
                    @forelse ($notifications as $item)
                        <li wire:click="read({{ $item->id }})"
                            class="flex hover:bg-gray-100 {{ $item->read_at == 'not_read' ? 'bg-gray-100' : '' }} p-1 rounded-lg cursor-pointer border-b py-2 justify-between items-center">
                            <div class="flex items-start justify-start space-x-2">
                                <div
                                    class="{{ $item->read_at == 'not_read' ? 'bg-red-600' : 'bg-main' }} mt-2 h-2 w-2 rounded-full">
                                </div>
                                <div>
                                    <p class="text-sm">{{ $item->description }}</p>
                                    <span
                                        class="text-xs text-gray-500">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span>
                                </div>
                            </div>
                            <div>
                                <img src="{{ asset('images/alisto-logo.png') }}"
                                    class="h-8 w-8 bg-blue-500 rounded-full" alt="">
                            </div>
                        </li>
                    @empty
                        <div>
                            <span class="text-sm text-gray-500">No Notification Available...</span>
                        </div>
                    @endforelse

                </ul>
            </div>


        </div>
    </div>
</div>
