<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\User;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Fieldset;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\TextInput;
use App\Models\Location as ModelsLocation;

class Location extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return ModelsLocation::query();
    }

    protected function getTableColumns(): array
    {
        return [

            Tables\Columns\TextColumn::make('location')->label('LOCATION')->searchable(),
            Tables\Columns\TextColumn::make('zip_code')->label('ZIP CODE')->searchable(),
        ];
    }

    protected function getTableHeaderActions()
    {
        return [
            Action::make('new_location')->label('New Location')->button()->size('md')->color('success')->icon('heroicon-o-plus-circle')->action(
                function ($record, $data) {
                    ModelsLocation::create([
                        'location' => $data['location'],
                        'zip_code' => $data['zipcode']
                    ]);

                    toastr()->addSuccess('Location added successfully');
                }
            )->form(
                    [
                        Fieldset::make('LOCATION INFORMATION')
                            ->schema([
                                TextInput::make('location')->label('Location')->required(),
                                TextInput::make('zipcode')->label('Zip Code')->required()
                            ])->columns(1)
                    ]
                )->modalWidth('xl'),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('edit')->label('Edit')->icon('heroicon-o-pencil-alt')->color('success')->action(
                function ($record, $data) {
                    $record->update($data);
                    toastr()->addSuccess('Location updated successfully');
                }
            )->form(
                    function ($record) {
                        return [
                            Fieldset::make('LOCATION INFORMATION')
                                ->schema([
                                    TextInput::make('location')->label('Location')->default($record->location)->required(),
                                    TextInput::make('zip_code')->label('Zip Code')->default($record->zip_code)->required()
                                ])->columns(1)
                        ];
                    }
                )->modalWidth('lg')->modalHeading('Update Location'),
            Tables\Actions\DeleteAction::make(),
        ];
    }
    public function render()
    {
        return view('livewire.admin.location');
    }
}