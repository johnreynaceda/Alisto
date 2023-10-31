<div>
    <div>
        <ul role="list" class="divide-y divide-gray-100">
            @forelse ($appointments as $item)
                {{-- <li class="flex justify-between items-center gap-x-6 py-5">
                    <div class="flex min-w-0 gap-x-4">

                        <div class="min-w-0 flex-auto">
                            <p class="2xl:text-lg font-semibold leading-6 uppercase text-main">
                                {{ $item->service->name }} ({{ $item->service_provider->user->name }})
                            </p>
                            <p class="mt-1 truncate text-xs 2xl:text-sm leading-5 text-gray-500">
                                &#8369;{{ number_format($item->service->price, 2) }} - {{ $item->information }}
                            </p>
                            </p>
                        </div>
                    </div>
                    <div class=" shrink-0 sm:flex sm:flex-col sm:items-end">
                        <div class="flex space-x-5 items-center">
                            <div>
                                <p class="text-sm leading-6 text-gray-900">
                                    @if ($item->status == 'approved')
                                        <x-badge flat positive label="Approved" />
                                    @elseif($item->status == 'pending')
                                        <x-badge flat warning label="Pending" />
                                    @elseif($item->status == 'declined')
                                        <x-badge flat negative label="Declined" />
                                    @elseif($item->status == 'done')
                                        <x-badge positive outline rounded label="Service Completed" />
                                    @else
                                        <x-badge negative outline rounded label="Cancelled" />
                                    @endif
                                </p>
                                <p class="mt-1 text-xs leading-5 text-gray-500">
                                    {{ \Carbon\Carbon::parse($item->appointment_date)->format('F d, Y h:i A') }}</p>
                            </div>
                            <div>
                                @if ($item->status == 'done' || $item->status == 'pending')
                                    @if ($item->status == 'pending')
                                        <x-button label="Cancel Appointment" xs icon="x" negative />
                                    @else
                                        <x-button label="Give Rating" xs icon="star" positive />
                                    @endif
                                @endif
                            </div>
                        </div>
                    </div>
                </li> --}}
                <div class="grid 2xl:grid-cols-4 grid-cols-1 gap-4 py-5">
                    <div class="2xl:col-span-2">
                        <p class="2xl:text-lg font-semibold leading-6 uppercase text-main">
                            {{ $item->service->name }} ({{ $item->service_provider->user->name }})
                        </p>
                        <p class="mt-1 truncate text-xs 2xl:text-sm leading-5 text-gray-500">
                            &#8369;{{ number_format($item->service->price, 2) }} - {{ $item->information }}
                        </p>
                        </p>
                    </div>
                    <div>
                        <div>
                            <p class="text-sm leading-6 text-gray-900">
                                @if ($item->status == 'approved')
                                    <x-badge flat positive label="Approved" />
                                @elseif($item->status == 'pending')
                                    <x-badge flat warning label="Pending" />
                                @elseif($item->status == 'declined')
                                    <x-badge flat negative label="Declined" />
                                @elseif($item->status == 'done')
                                    <x-badge positive outline rounded label="Service Completed" />
                                @else
                                    <x-badge negative outline rounded label="Cancelled" />
                                @endif
                            </p>
                            <p class="mt-1 text-xs leading-5 text-gray-500">
                                Created
                                Date: {{ \Carbon\Carbon::parse($item->created_at)->format('F d, Y h:i a') }}</p>
                            <p class="mt-1 text-xs leading-5 text-gray-500">
                                Appointment
                                Date: {{ \Carbon\Carbon::parse($item->appointment_date)->format('F d, Y h:i a') }}</p>
                        </div>
                    </div>

                    <div class="2xl:grid 2xl:place-content-end">
                        @if ($item->status == 'done' || $item->status == 'pending')
                            @if ($item->status == 'pending')
                                <x-button label="Cancel Appointment" wire:click="cancelAppointment({{ $item->id }})"
                                    xs class="w-auto" icon="x" negative />
                            @else
                                @if ($item->feedback == null)
                                    <x-button label="Give Rating" wire:click="feedback({{ $item->id }})" xs
                                        icon="star" positive />
                                @endif
                            @endif
                        @endif
                    </div>
                </div>
            @empty
            @endforelse
        </ul>

    </div>

    <x-modal wire:model.defer="feedback_modal" align="center">

        <x-card title="Feedback Information">
            <div>
                <div>
                    <div x-data="{ rating: @entangle('rating') }">
                        <span>Rate</span>
                        <div class="flex items-center space-x-1">
                            <template x-for="i in 5">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 cursor-pointer"
                                    @click="rating = i"
                                    :class="{ 'text-yellow-400': i <= rating, 'text-gray-600': i > rating }"
                                    fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M12 17l-4.293 4.293a1 1 0 01-1.414 0L7 20a1 1 0 010-1.414L9.586 16H4a1 1 0 01-1-1v-2a1 1 0 011-1h5.586l-2.293-2.293a1 1 0 010-1.414L7 10a1 1 0 011.414 0L12 13l4.293-4.293a1 1 0 011.414 0L17 10a1 1 0 010 1.414L14.414 14H20a1 1 0 011 1v2a1 1 0 01-1 1h-5.586l2.293 2.293a1 1 0 010 1.414L17 20a1 1 0 01-1.414 0L12 17z" />
                                </svg>
                            </template>
                        </div>
                    </div>
                </div>

                <div class="mt-5">
                    {{ $this->form }}
                </div>
            </div>
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary spinner="submitFeedback" label="Submit"
                        x-on:confirm="{
                        title: 'Sure to Submit?',
                        icon: 'question',
                        method: 'submitFeedback',

                    }" />
                </div>

            </x-slot>

        </x-card>

    </x-modal>
</div>
