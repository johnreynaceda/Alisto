<?php

namespace App\Http\Livewire\Admin;

use App\Models\ClientInformation;
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
use App\Models\Service;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Livewire\WithFileUploads;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;

class AdminDashboard extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    public function render()
    {
        return view('livewire.admin.admin-dashboard', [
            'service_provider' => ServiceProvider::count(),
            'services' => Service::count(),
            'clients' => ClientInformation::count(),
            'categories' => ServiceCategory::count(),
        ]);
    }



    protected function getTableQuery(): Builder
    {
        return ServiceProvider::query()->where('is_approved', 0);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('user.name')->label('PROVIDER NAME')->searchable(),
            TextColumn::make('user.email')->label('EMAIL')->searchable(),
            TextColumn::make('location.location')->label('LOCATION')->searchable(),
            TextColumn::make('service_category.name')->label('SERVICE CATEGORY')->searchable(),

        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('approve')->label('Approve')->button()->color('success')->icon('heroicon-o-thumb-up')->action(
                function ($record) {
                    $record->update([
                        'is_approved' => 1,
                    ]);
                }
            ),
            Action::make('disapprove')->label('Disapprove')->button()->color('danger')->icon('heroicon-o-thumb-down')->action(
                function ($record) {
                    $record->update([
                        'is_approved' => 2,
                    ]);
                }
            ),
        ];
    }

}