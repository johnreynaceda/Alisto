<div>
    <div class="flex justify-between items-center">
        <livewire:provider.upload-credential />
        <x-button label="Add New Category" wire:click="$set('add_modal', true)" teal class="font-semibold" rounded
            icon="plus" md />
    </div>
    <div class="mt-5">
        {{ $this->table }}
    </div>
    <x-modal wire:model.defer="add_modal" align="center" max-width="4xl">
        <x-card title="NEW SERVICES">
            <div class="p-5">
                {{ $this->form }}
            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button rounded teal icon="save" wire:click="saveService" spinner="saveService"
                        label="Submit" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>

    <x-modal wire:model.defer="credentials_modal" align="center" max-width="4xl">
        <x-card title="UPLOAD CREDENTIALS">
            <div class="p-5">
                {{ $this->form }}
            </div>

            <x-slot name="footer">
                <div class="flex justify-end gap-x-4">
                    <x-button flat label="Cancel" x-on:click="close" />
                    <x-button rounded teal icon="save" wire:click="saveService" spinner="saveService"
                        label="Submit" />
                </div>
            </x-slot>
        </x-card>
    </x-modal>
</div>
