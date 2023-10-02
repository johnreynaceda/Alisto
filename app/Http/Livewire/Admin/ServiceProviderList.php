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
            BadgeColumn::make('is_approved')
                ->enum([
                    1 => 'Approved',
                    0 => 'Pending',
                ])->colors([
                        'success' => 1,
                        'warning' => 0,
                    ])->icons([
                        'heroicon-o-thumb-up' => 1,
                        'heroicon-o-thumb-down' => 0,
                    ])

        ];
    }

    public function render()
    {
        return view('livewire.admin.service-provider-list');
    }
}