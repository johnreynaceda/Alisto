<?php

namespace App\Http\Livewire\Admin;

use App\Models\ServiceCategory;
use Livewire\Component;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\FileUpload;
use Livewire\WithFileUploads;

class CategoryAdd extends Component implements Forms\Contracts\HasForms
{
    use WithFileUploads;
    use Forms\Concerns\InteractsWithForms;

    public $name, $average, $attachment;
    public function render()
    {
        return view('livewire.admin.category-add');
    }

    protected function getFormSchema(): array
    {
        return [
            Fieldset::make('CATEGORY INFORMATION')
                ->schema([
                    TextInput::make('name')->required(),
                    TextInput::make('average')->label('Average Project')->required(),
                ])
                ->columns(2),
            Grid::make(3)
                ->schema([
                    FileUpload::make('attachment')->reactive()->required()
                ])
        ];
    }

    public function submitRecord()
    {
        sleep(3);
        foreach ($this->attachment as $key => $value) {
            ServiceCategory::create([
                'name' => $this->name,
                'avg_project' => $this->average,
                'banner_path' => $value->store('ServiceCategory', 'public'),
            ]);
        }

        return redirect()->route('admin.category');
    }
}