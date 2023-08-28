<?php

namespace App\Http\Livewire\Provider;

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

class Services extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    use WithFileUploads;
    public $add_modal = false;
    public $name, $price, $description;
    public $attachment = [];


    protected function getTableQuery(): Builder
    {
        return Service::query()->where('service_provider_id', auth()->user()->service_provider->id);
    }

    protected function getFormSchema(): array
    {
        return [
            Grid::make(2)
                ->schema([
                    TextInput::make('name')->label('Name')->required(),
                    TextInput::make('price')->label('Price')->numeric()->required(),

                ]),


            Textarea::make('description')->label('Description'),
            FileUpload::make('attachment')
        ];
    }

    protected function getTableColumns(): array
    {
        return [
            ViewColumn::make('image')->view('provider.filament-service'),
            TextColumn::make('name')->searchable(),
            TextColumn::make('price')->formatStateUsing(
                function ($record) {
                    return '₱' . number_format($record->price, 2);
                }
            )->searchable(),

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

    protected function getTableContentGrid(): ?array
    {
        return [
            'md' => 3,
            'xl' => 4,
        ];
    }

    public function saveService()
    {
        $this->validate([
            'name' => 'required',
            'price' => 'required|numeric',
            'description' => 'nullable',
            'attachment' => 'nullable',
        ]);

        foreach ($this->attachment as $key => $item) {
            $service = Service::create([
                'name' => $this->name,
                'service_category_id' => auth()->user()->service_provider->service_category_id,
                'service_provider_id' => auth()->user()->service_provider->id,
                'price' => $this->price,
                'description' => $this->description,
                'image_path' => $item->store('services', 'public'),
            ]);
        }

        $this->add_modal = false;
        $this->name = '';
        $this->price = '';
        $this->description = '';
        $this->attachment = '';
    }

    public function render()
    {
        return view('livewire.provider.services');
    }
}