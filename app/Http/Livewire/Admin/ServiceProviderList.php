<?php

namespace App\Http\Livewire\Admin;

use App\Models\ServiceProvider;
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

class ServiceProviderList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    public $view_details = false;

    public $provider_details = [];

    protected function getTableQuery(): Builder
    {
        return ServiceProvider::query();
    }

    protected function getTableColumns(): array
    {
        return [

            Tables\Columns\TextColumn::make('user.name')->label('NAME')->searchable(),
            Tables\Columns\TextColumn::make('location.location')->label('LOCATION')->searchable(),
            Tables\Columns\TextColumn::make('service_category.name')->label('SERVICE CATEGORY')->searchable(),
            BadgeColumn::make('is_approved')->label('APPROVED/DISAPPROVED')
                ->enum([
                    1 => 'Approved',
                    0 => 'Pending',
                    2 => 'Disapproved'
                ])->colors([
                        'success' => 1,
                        'warning' => 0,
                        'danger' => 2
                    ])->icons([
                        'heroicon-o-thumb-up' => 1,
                        'heroicon-o-thumb-down' => 0,
                        'heroicon-o-x' => 2,
                    ])

        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('edit')->label('View Details')->icon('heroicon-o-eye')->color('warning')->action(
                function ($record) {
                    $this->provider_details = $record;
                    $this->view_details = true;
                }
            )
        ];
    }

    public function render()
    {
        return view('livewire.admin.service-provider-list');
    }
}
