<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\ServiceCategory;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Fieldset;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\TextInput;

class Category extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return ServiceCategory::query();
    }

    protected function getTableColumns(): array
    {
        return [

            Tables\Columns\TextColumn::make('name')->label('NAME')->searchable(),
            Tables\Columns\TextColumn::make('avg_project')->label('AVERAGE PROJECT')->searchable()->formatStateUsing(
                function ($record) {
                    return '₱' . $record->avg_project;
                }
            ),
        ];
    }

    protected function getTableHeaderActions()
    {
        return [
            Action::make('new_category')->label('New Category')->button()->size('md')->color('gray')->icon('heroicon-o-plus-circle')->action(
                function ($record, $data) {
                    // ServiceCategory::create([
                    //     'name' => $data['name'],
                    //     'avg_project' => $data['avg_project'],
                    // ]);
        
                    return redirect()->route('admin.category.add');

                }
            ),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('edit')->label('Edit')->icon('heroicon-o-pencil-alt')->color('success')->action(
                function ($record, $data) {
                    $record->update($data);
                }
            )->form(
                    function ($record) {
                        return [
                            Fieldset::make('CATEGORY INFORMATION')
                                ->schema([
                                    TextInput::make('name')->label('Name')->required()->default($record->name),
                                    TextInput::make('avg_project')->label('Average Project')->required()->default($record->avg_project),
                                ])->columns(1)
                        ];
                    }
                )->modalWidth('lg')->modalHeading('Update Category'),
            Tables\Actions\DeleteAction::make(),
        ];
    }

    public function render()
    {
        return view('livewire.admin.category');
    }
}