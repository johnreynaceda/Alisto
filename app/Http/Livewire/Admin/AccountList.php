<?php

namespace App\Http\Livewire\Admin;

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

class AccountList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return User::query();
    }

    protected function getTableColumns(): array
    {
        return [

            Tables\Columns\TextColumn::make('name')->label('NAME')->searchable(),
            Tables\Columns\TextColumn::make('email')->label('EMAIL')->searchable(),

            BadgeColumn::make('user_type')->label('USER TYPE')
                ->enum([
                    'admin' => 'Administrator',
                    'service provider' => 'Service Provider',
                    'client' => 'Client',
                ])->colors([
                        'success' => 'admin',
                        'warning' => 'service provider',
                        'danger' => 'client'
                    ])

        ];
    }

    public function render()
    {
        return view('livewire.admin.account-list');
    }
}