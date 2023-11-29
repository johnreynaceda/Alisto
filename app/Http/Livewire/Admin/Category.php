<?php

namespace App\Http\Livewire\Admin;

use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Textarea;
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

    public $edit_modal = false;
    public $service_data;

    public $name, $description, $average, $attachment;

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
            Tables\Columns\TextColumn::make('description')->label('DESCRIPTION')->words(10)->searchable(),
        ];
    }

    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('attachment')->label('Banner')
        ];
    }

    protected function getTableHeaderActions()
    {
        return [
            Action::make('new_category')->label('Add Service')->button()->size('md')->color('success')->icon('heroicon-o-plus-circle')->action(
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
                    $this->edit_modal = true;
                    $this->service_data = $record;
                    $this->name = $record->name;
                    $this->description = $record->description;
                    $this->average = $record->avg_project;
                }
            ),
            Tables\Actions\DeleteAction::make(),
        ];
    }

    public function updateCategory()
    {
        $data = ServiceCategory::where('id', $this->service_data->id)->first();
        if ($this->attachment != null) {
            foreach ($this->attachment as $key => $value) {
                $data->update([
                    'name' => $this->name,
                    'avg_project' => $this->average,
                    'description' => $this->description,
                    'banner_path' => $value->store('ServiceCategory', 'public'),
                ]);

            }
        } else {
            $data->update([
                'name' => $this->name,
                'avg_project' => $this->average,
                'description' => $this->description,
                'banner_path' => $this->service_data->banner_path,
            ]);
        }
        sweetalert()->addSuccess('Updated Successfully');
        $this->reset('name', 'service_data', 'description', 'average', 'attachment');
        $this->edit_modal = false;

    }

    public function render()
    {
        return view('livewire.admin.category');
    }
}
