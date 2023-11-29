<div>
    <div class="grid 2xl:grid-cols-5 grid-cols-1 gap-4">
        <div class="col-span-2">
            <div class="border rounded-xl">
                <div class="hedear p-5">
                    <h1 class="font-bold text-main">SERVICE PROVIDER PROFILE</h1>
                    <div class="mt-3 flex space-x-3 ">
                        <div>

                            @if ($service->service_provider->user->user_profile != null)
                                <img src="{{ Storage::url($service->service_provider->user->user_profile->user_profile_path) }}"
                                    alt="" class="2xl:h-20 h-10 rounded-lg border">
                            @else
                                <img src="{{ asset('images/sample.png') }}" alt=""
                                    class="2xl:h-20 h-10 rounded-lg border">
                            @endif
                        </div>
                        <div>
                            <div x-data="{ open: false }">
                                <div class="flex justify-between items-end space-x-4">
                                    <h1 class="font-medium uppercase text-gray-700">
                                        {{ $service->service_provider->user->name }}
                                    </h1>
                                    <div>
                                        @php
                                            $total_ratings = \App\Models\Feedback::where('service_provider_id', $service->service_provider_id)->count();

                                            if ($total_ratings > 0) {
                                                $sumRatings = array_sum(
                                                    \App\Models\Feedback::where('service_provider_id', $service->service_provider_id)
                                                        ->pluck('rating')
                                                        ->toArray(),
                                                );
                                                $averageRating = $sumRatings / $total_ratings;
                                            } else {
                                                $averageRating = 0; // Set a default value if there are no ratings
                                            }
                                        @endphp
                                        <span class="text-xs">{{ number_format($averageRating, 1) }} out of 5</span>
                                        <div x-data="{ rating: {{ number_format($averageRating, 1) }} }">
                                            <div class="flex items-center">
                                                @for ($i = 0; $i < 5; $i++)
                                                    @if (floor(number_format($averageRating, 1)) - $i >= 1)
                                                        {{-- Full Star --}}
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            class="h-4 w-4 fill-yellow-400">
                                                            <path
                                                                d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z">
                                                            </path>
                                                        </svg>
                                                    @elseif (number_format($averageRating, 1) - $i > 0)
                                                        {{-- Half Star --}}
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            class="h-4 w-4 fill-yellow-400">
                                                            <path
                                                                d="M12.0006 15.968L16.2473 18.3451L15.2988 13.5717L18.8719 10.2674L14.039 9.69434L12.0006 5.27502V15.968ZM12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z">
                                                            </path>
                                                        </svg>
                                                    @else
                                                        {{-- Empty Star --}}
                                                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                                            class="h-4 w-4 fill-gray-600">
                                                            <path
                                                                d="M12.0006 18.26L4.94715 22.2082L6.52248 14.2799L0.587891 8.7918L8.61493 7.84006L12.0006 0.5L15.3862 7.84006L23.4132 8.7918L17.4787 14.2799L19.054 22.2082L12.0006 18.26Z">
                                                            </path>
                                                        </svg>
                                                    @endif
                                                @endfor
                                            </div>
                                        </div>
                                    </div>
                                    <span class="text-sm cursor-pointer hover:text-green-600" x-on:click="open = !open">
                                        @php
                                            $all = \App\Models\Feedback::where('service_provider_id', $service->service_provider_id)->count();

                                            if ($all >= 1000) {
                                                $all = number_format($all / 1000, 1) . 'K';
                                            }
                                        @endphp
                                        @if ($all > 0)
                                            {{ $all }} Reviews
                                        @endif
                                    </span>
                                </div>
                                <div x-animate x-show="open" class="grid grid-cols-5 gap-2">
                                    <div class="border p-1 rounded-lg text-main text-xs border-main">
                                        5 Star (
                                        @php
                                            $all = \App\Models\Feedback::where('service_provider_id', $service->service_provider_id)
                                                ->where('rating', 5)
                                                ->count();

                                            if ($all >= 1000) {
                                                $all = number_format($all / 1000, 1) . 'K';
                                            }
                                        @endphp
                                        {{ $all }}
                                        )
                                    </div>
                                    <div class="border p-1 rounded-lg text-main text-xs border-main">
                                        4 Star (@php
                                            $all = \App\Models\Feedback::where('service_provider_id', $service->service_provider_id)
                                                ->where('rating', 4)
                                                ->count();

                                            if ($all >= 1000) {
                                                $all = number_format($all / 1000, 1) . 'K';
                                            }
                                        @endphp
                                        {{ $all }})
                                    </div>
                                    <div class="border p-1 rounded-lg text-main text-xs border-main">
                                        3 Star (
                                        @php
                                            $all = \App\Models\Feedback::where('service_provider_id', $service->service_provider_id)
                                                ->where('rating', 3)
                                                ->count();

                                            if ($all >= 1000) {
                                                $all = number_format($all / 1000, 1) . 'K';
                                            }
                                        @endphp
                                        {{ $all }}
                                        )
                                    </div>
                                    <div class="border p-1 rounded-lg text-main text-xs border-main">
                                        2 Star (
                                        @php
                                            $all = \App\Models\Feedback::where('service_provider_id', $service->service_provider_id)
                                                ->where('rating', 2)
                                                ->count();

                                            if ($all >= 1000) {
                                                $all = number_format($all / 1000, 1) . 'K';
                                            }
                                        @endphp
                                        {{ $all }}
                                        )
                                    </div>
                                    <div class="border p-1 rounded-lg text-main text-xs border-main">
                                        1 Star (@php
                                            $all = \App\Models\Feedback::where('service_provider_id', $service->service_provider_id)
                                                ->where('rating', 1)
                                                ->count();

                                            if ($all >= 1000) {
                                                $all = number_format($all / 1000, 1) . 'K';
                                            }
                                        @endphp
                                        {{ $all }})
                                    </div>
                                </div>
                            </div>
                            <div class="flex space-x-1 items-center mt-3">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"
                                    class="h-4 w-4 fill-red-500">
                                    <path
                                        d="M17.0839 15.812C19.6827 13.0691 19.6379 8.73845 16.9497 6.05025C14.2161 3.31658 9.78392 3.31658 7.05025 6.05025C4.36205 8.73845 4.31734 13.0691 6.91612 15.812C7.97763 14.1228 9.8577 13 12 13C14.1423 13 16.0224 14.1228 17.0839 15.812ZM12 23.7279L5.63604 17.364C2.12132 13.8492 2.12132 8.15076 5.63604 4.63604C9.15076 1.12132 14.8492 1.12132 18.364 4.63604C21.8787 8.15076 21.8787 13.8492 18.364 17.364L12 23.7279ZM12 12C10.3431 12 9 10.6569 9 9C9 7.34315 10.3431 6 12 6C13.6569 6 15 7.34315 15 9C15 10.6569 13.6569 12 12 12Z">
                                    </path>
                                </svg>
                                <span
                                    class="text-sm text-gray-600">{{ $service->service_provider->location->location }}</span>
                            </div>
                            <div class="flex items-center text-gray-600">
                                <span>@</span>
                                <span class="text-sm ">{{ $service->service_provider->user->email }}</span>
                            </div>
                            <div class="flex space-x-1 items-center text-gray-600 fill-gray-600">
                                <span><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-3 w-3">
                                        <path
                                            d="M21 16.42V19.9561C21 20.4811 20.5941 20.9167 20.0705 20.9537C19.6331 20.9846 19.2763 21 19 21C10.1634 21 3 13.8366 3 5C3 4.72371 3.01545 4.36687 3.04635 3.9295C3.08337 3.40588 3.51894 3 4.04386 3H7.5801C7.83678 3 8.05176 3.19442 8.07753 3.4498C8.10067 3.67907 8.12218 3.86314 8.14207 4.00202C8.34435 5.41472 8.75753 6.75936 9.3487 8.00303C9.44359 8.20265 9.38171 8.44159 9.20185 8.57006L7.04355 10.1118C8.35752 13.1811 10.8189 15.6425 13.8882 16.9565L15.4271 14.8019C15.5572 14.6199 15.799 14.5573 16.001 14.6532C17.2446 15.2439 18.5891 15.6566 20.0016 15.8584C20.1396 15.8782 20.3225 15.8995 20.5502 15.9225C20.8056 15.9483 21 16.1633 21 16.42Z">
                                        </path>
                                    </svg></span>
                                <span class="text-sm ">{{ $service->service_provider->phone_number }}</span>
                            </div>
                            <div class="flex flex-col space-x-1 items-start">
                                <span class="text-xs">Credentials</span>
                                <div class="flex space-x-2">
                                    @foreach ($service->service_provider->user->provider_credentials as $item)
                                        <a href="{{ Storage::url($item->credentials_path) }}" target="_blank"
                                            class="text-xs text-main">
                                            View
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="border mt-3 rounded-xl">
                <div class="hedear p-5">
                    <h1 class="font-bold text-main">SELECTED SERVICE</h1>
                    <div class="mt-3 flex space-x-3 ">
                        <div>
                            @if ($service->image_path != null)
                                <img src="{{ Storage::url($service->image_path) }}" alt=""
                                    class="2xl:h-20 h-10 object-cover rounded-lg border">
                            @else
                                <img src="{{ asset('images/sample.png') }}" alt=""
                                    class="2xl:h-20 object-cover h-10 rounded-lg border">
                            @endif
                        </div>
                        <div>
                            <h1 class="font-medium uppercase text-gray-700">{{ $service->name }}
                            </h1>
                            <div class="flex space-x-1 items-center">

                                <span class="text-sm text-gray-600">&#8369;{{ number_format($service->price, 2) }}
                                    @if ($service->is_hour)
                                        /hour
                                    @endif
                                </span>
                            </div>
                            <p>{{ $service->description }}</p>
                        </div>
                    </div>
                </div>
                <div class="hedear p-5">
                    <h1 class="font-bold text-main">OTHER SERVICES</h1>
                    @foreach ($others as $item)
                        <span class="uppercase text-xs text-gray-600">{{ $item->name }}</span>
                        @if (!$loop->last)
                            ,
                        @endif
                    @endforeach
                </div>
            </div>

        </div>
        <div class="col-span-2">
            <div class=" border p-5   border-b-4 border-main shadow-xl rounded-xl ">
                <div wire:ignore id='calendar'></div>
            </div>
        </div>
        <div class="flex  flex-col space-y-3">

            <div class="p-5 border border-main border-b-2 rounded-xl">
                <header class="font-semibold text-gray-700">DATE AND TIME</header>
                <div class="mt-2 grid grid-cols-1 gap-3">
                    <x-datetime-picker label="Date" placeholder="" wire:model="date" without-time />
                    <x-time-picker label="AM/PM" wire:model="time" />
                </div>
            </div>
            <div class="p-5 border border-main border-b-2 rounded-xl">
                <header class="font-semibold text-gray-700">INFORMATION</header>
                <div class="mt-2">
                    <x-textarea wire:model.defer="information" placeholder="Your comment" />
                </div>
            </div>
            <div class="flex justify-end">
                <x-button label="SUBMIT BOOKING" wire:click="submitBooking" spinner="submitBooking"
                    right-icon="arrow-right" teal class="font-semibold" rounded />
            </div>
        </div>

    </div>
</div>
@push('scripts')
    <style>
        #calendar .fc-button {
            background-color: #1B7B8B;
            border-color: #1B7B8B;
        }
    </style>
    <script>
        document.addEventListener('livewire:load', function() {
            var calendarEl = document.getElementById('calendar');
            var eventData = @this.events; // Livewire data binding

            var calendar = new FullCalendar.Calendar(calendarEl, {
                // FullCalendar options here
                initialView: 'dayGridMonth',
                views: {
                    timeGridWeek: {
                        type: 'timeGrid',
                        duration: {
                            days: 7
                        },
                        buttonText: 'week'
                    }
                },
                headerToolbar: {
                    start: 'prev',
                    center: 'title',
                    end: 'next'
                },
                displayEventTime: true,
                eventColor: '#1B7B8B',
                events: JSON.parse(eventData), // Parse the Livewire data
            });

            calendar.render();
        });
    </script>
@endpush
