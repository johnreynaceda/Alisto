<?php

namespace App\Http\Livewire\Client;

use App\Models\ClientInformation;
use App\Models\Location;
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

class ServicesOffered extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    use WithFileUploads;
    public $has_details;
    public $firstname, $middlename, $lastname, $contact_number, $address, $zipcode, $attachment = [];
    public $location_id;

    public $complete_details = false;
    public function mount()
    {
        if (auth()->user()->client_information == null) {
            $this->has_details = true;
        } else {
            $this->has_details = false;
            $this->location_id = Location::where('zip_code', auth()->user()->client_information->zipcode)->first()->id;
        }
    }

    protected function getFormSchema(): array
    {
        return [
            Grid::make(2)
                ->schema([
                    TextInput::make('firstname')->label('First Name')->required(),
                    TextInput::make('middlename')->label('Middle Name')->required(),
                    TextInput::make('lastname')->label('Last Name')->required(),
                    TextInput::make('contact_number')->numeric()->label('Contact Number')->required()->mask(fn(TextInput\Mask $mask) => $mask->pattern('00000000000')),
                    TextInput::make('address')->label('Address')->required(),
                    TextInput::make('zipcode')->label('Zip Code')->required(),
                ]),
            FileUpload::make('attachment')->label('Identification Card')->required()->helperText('Please upload a valid identification card.'),
        ];
    }

    public function saveDetails()
    {
        $this->validate([
            'firstname' => 'required',
            'middlename' => 'required',
            'lastname' => 'required',
            'contact_number' => 'required',
            'address' => 'required',
            'zipcode' => 'required',
            'attachment' => 'required',
        ]);
        foreach ($this->attachment as $key => $item) {
            ClientInformation::create([
                'firstname' => $this->firstname,
                'middlename' => $this->middlename,
                'lastname' => $this->lastname,
                'user_id' => auth()->user()->id,
                'contact_number' => $this->contact_number,
                'address' => $this->address,
                'zipcode' => $this->zipcode,
                'identification_card_path' => $item->store('client_ID', 'public'),
            ]);
        }
        $this->reset('firstname', 'middlename', 'lastname', 'contact_number', 'address', 'zipcode', 'attachment');
        sweetalert()->addSuccess('Your Account has been created!');

        $this->complete_details = false;
        $this->has_details = false;
        return redirect()->route('dashboard');

    }
    public function render()
    {

        return view('livewire.client.services-offered', [
            'categories' => $this->generatedQuery(),
        ]);
    }

    public function generatedQuery()
    {

        if (auth()->user()->client_information != null) {

            return ServiceCategory::whereHas('service_providers', function ($query) {
                $query->where('is_approved', 1)->whereHas('location', function ($query) {
                    $query->where('zip_code', auth()->user()->client_information->zipcode);
                });
            })->get();

        } else {

            return ServiceCategory::whereHas('service_providers', function ($query) {
                $query->where('is_approved', 1);
            })->get();

        }
    }
}
