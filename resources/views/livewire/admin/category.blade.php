<div>
    <div>
        {{ $this->table }}
    </div>

    <x-modal wire:model.defer="edit_modal">
        <x-card title="Update Service">
            <div>
                <div class="flex flex-col space-y-3">
                    <x-input wire:model="name" label="Name" placeholder="" />
                    <x-input wire:model="average" label="Avg. Project" placeholder="" />
                    <x-textarea wire:model="description" label="Description" placeholder="" />
                    <div>
                        <h1>Last Uploaded:</h1>
                        <div>
                            <img src="{{ asset(Storage::url($service_data->banner_path ?? '')) }}"
                                class="h-40 rounded-xl w-40 object-cover" alt="">
                        </div>

                    </div>
                    {{ $this->form }}
                </div>
            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button primary label="Update" wire:click="updateCategory" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
