<div>
    <div class="grid 2xl:grid-cols-2 grid-cols-1 gap-10">

        <div class=" border p-5  border-b-4 border-main shadow-xl rounded-xl ">
            <div wire:ignore id='calendar'></div>
        </div>
        <div class="flex flex-col space-y-3">
            <div class="p-5 border border-main border-b-2 rounded-xl">
                <header class="font-semibold text-gray-700">SERVICE SELECTED</header>
                <div class="mt-2 grid grid-cols-1 2xl:grid-cols-2 gap-3">
                    <div class="flex space-x-1 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5 fill-main">
                            <path
                                d="M9 1V3H15V1H17V3H21C21.5523 3 22 3.44772 22 4V20C22 20.5523 21.5523 21 21 21H3C2.44772 21 2 20.5523 2 20V4C2 3.44772 2.44772 3 3 3H7V1H9ZM20 8H4V19H20V8ZM15.0355 10.136L16.4497 11.5503L11.5 16.5L7.96447 12.9645L9.37868 11.5503L11.5 13.6716L15.0355 10.136Z">
                            </path>
                        </svg>
                        <span class="uppercase font-medium">{{ $service->name }}</span>
                    </div>
                    <span>({{ $service->service_provider->user->name }})</span>
                </div>
            </div>
            <div class="p-5 border border-main border-b-2 rounded-xl">
                <header class="font-semibold text-gray-700">DATE AND TIME</header>
                <div class="mt-2 grid 2xl:grid-cols-2 grid-cols-1 gap-3">
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
                <x-button label="SUBMIT BOOKING" wire:click="submitBooking" right-icon="arrow-right" teal
                    class="font-semibold" rounded />
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
                    start: 'prev next',
                    center: 'title',
                    end: 'timeGridWeek dayGridMonth'
                },
                displayEventTime: true,
                eventColor: '#1B7B8B',
                events: JSON.parse(eventData), // Parse the Livewire data
            });

            calendar.render();
        });
    </script>
@endpush
