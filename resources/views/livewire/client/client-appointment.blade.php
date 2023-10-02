<div>
    <div>
        <ul role="list" class="divide-y divide-gray-100">
            @forelse ($appointments as $item)
                <li class="flex justify-between items-center gap-x-6 py-5">
                    <div class="flex min-w-0 gap-x-4">

                        <div class="min-w-0 flex-auto">
                            <p class="text-lg font-semibold leading-6 uppercase text-main">{{ $item->user->name }}
                            </p>
                            <p class="mt-1 truncate text-xs leading-5 text-gray-500">{{ $item->information }}
                            </p>
                            </p>
                        </div>
                    </div>
                    <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
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
                                <x-dropdown>
                                    <x-dropdown.header label="Actions">
                                        @if ($item->status == 'pending')
                                            <x-dropdown.item label="Cancel Appointment"
                                                wire:click="cancelAppointment({{ $item->id }})" />
                                        @else
                                            <x-dropdown.item label="Give Feedback"
                                                wire:click="feedback({{ $item->id }})" />
                                        @endif
                                    </x-dropdown.header>
                                </x-dropdown>
                            </div>
                        </div>
                    </div>
                </li>
            @empty
            @endforelse
        </ul>

    </div>

    <x-modal wire:model.defer="feedback_modal" align="center">

        <x-card title="Feedback Information">
            <div>
                {{ $this->form }}
            </div>
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary label="Submit"
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
