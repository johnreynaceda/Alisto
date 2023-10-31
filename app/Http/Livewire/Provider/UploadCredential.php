<?php

namespace App\Http\Livewire\Provider;

use App\Models\ProviderCredential;
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

class UploadCredential extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    use WithFileUploads;

    public $attachment = [];
    public $credentials_modal = false;
    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('attachment')->multiple()
        ];
    }

    public function saveCredential()
    {
        sleep(2);
        foreach ($this->attachment as $key => $value) {
            ProviderCredential::create([
                'user_id' => auth()->user()->id,
                'credentials_path' => $value->store('credentials', 'public'),
            ]);

        }
        $this->reset('attachment');
        // $this->credentials_modal = false;
    }
    public function render()
    {
        return view('livewire.provider.upload-credential', [
            'credentials' => ProviderCredential::where('user_id', auth()->user()->id)->get(),
        ]);
    }

    public function delete($id)
    {
        ProviderCredential::where('id', $id)->delete();
    }
}