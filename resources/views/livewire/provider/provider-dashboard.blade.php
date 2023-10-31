<div>
    <div>
        {{ $this->table }}
    </div>

    <x-modal wire:model.defer="view_modal" align="center" max-width="3xl">
        <x-card title="View Details">
            <div class="grid grid-cols-2 gap-5">
                <div>
                    <h1 class="text-sm uppercase">Service Name</h1>
                    <h1 class="text-lg font-bold">{{ $view_details->service->service_category->name ?? '' }}</h1>
                </div>
                <div>
                    <h1 class="text-sm uppercase">Category Service</h1>
                    <h1 class="text-lg font-bold">{{ $view_details->service->name ?? '' }}</h1>
                </div>
                <div>
                    <h1 class="text-sm uppercase">Service Price</h1>
                    <h1 class="text-lg font-bold">&#8369;{{ number_format($view_details->service->price ?? 0, 2) }}</h1>
                </div>
                <div>
                    <h1 class="text-sm uppercase">Service Description</h1>
                    <p class="text-lg font-bold">{{ $view_details->service->description ?? '' }}</p>
                </div>
                <div>
                    <h1 class="text-sm uppercase">Client Name</h1>
                    <h1 class="text-lg font-bold">
                        {{ ($view_details->user->client_information->firstname ?? '') . ' ' . ($view_details->user->client_information->lastname ?? '') }}
                    </h1>
                </div>
                <div>
                    <h1 class="text-sm uppercase">Client Address</h1>
                    <h1 class="text-lg font-bold">
                        {{ $view_details->user->client_information->address ?? '' }}
                    </h1>
                </div>
            </div>
            <div class="mt-5 grid grid-cols-2 gap-5">
                <div>
                    <h1 class="text-sm uppercase">Created date</h1>
                    <h1 class="text-lg font-bold">
                        {{ \Carbon\Carbon::parse($view_details->created_at ?? '')->format('F d, Y') }}</h1>
                </div>
                <div>
                    <h1 class="text-sm uppercase">Appointment date</h1>
                    <h1 class="text-lg font-bold">
                        {{ \Carbon\Carbon::parse($view_details->appointment_date ?? '')->format('F d, Y') }}</h1>
                </div>
            </div>
            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />

                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
