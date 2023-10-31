<?php

namespace App\Http\Livewire\Provider;

use App\Models\ClientAppointment;
use App\Models\ClientInformation;
use App\Models\ServiceProvider;
use App\Models\User;
use Livewire\Component;
use App\Models\ServiceCategory;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Fieldset;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Columns\ViewColumn;

class ProviderClient extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    public $view_details = false;

    public $client_details = [];
    public $unique_ids = [];
    public function mount()
    {
        $ids = ClientAppointment::where('service_provider_id', auth()->user()->service_provider->id)->get()->groupBy('user_id');
        foreach ($ids as $key => $value) {
            $this->unique_ids[] = $key;
        }
    }

    protected function getTableQuery(): Builder
    {

        return ClientInformation::query()->whereIn('user_id', $this->unique_ids);
    }

    protected function getTableColumns(): array
    {
        return [

            Tables\Columns\TextColumn::make('name')->label('FULLNAME')->formatStateUsing(
                function ($record) {
                    return strtoupper($record->user->client_information->firstname . ' ' . $record->user->client_information->lastname);
                }
            )->searchable(),
            Tables\Columns\TextColumn::make('address')->label('ADDRESS')->searchable(),
            Tables\Columns\TextColumn::make('contact_number')->label('CONTACT')->searchable(),
            ViewColumn::make('id')->label('VALID ID')->view('admin.filament.client')

        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('edit')->label('View Details')->icon('heroicon-o-eye')->color('warning')->action(
                function ($record) {
                    $this->client_details = $record;
                    $this->view_details = true;
                }
            )
        ];
    }


    public function render()
    {
        return view('livewire.provider.provider-client');
    }
}
