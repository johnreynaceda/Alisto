<?php

namespace App\Http\Livewire\Client;

use App\Models\User;
use App\Models\UserProfile;
use Livewire\Component;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Livewire\WithFileUploads;

class UpdateProfile extends Component implements Forms\Contracts\HasForms
{
    use WithFileUploads;
    use Forms\Concerns\InteractsWithForms;

    public $name, $email, $attachment, $contact, $zipcode;


    public function render()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
        return view('livewire.client.update-profile');
    }

    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('attachment')->label('Profile Picture')->reactive()->required(),
            TextInput::make('name')->required()->placeholder(auth()->user()->name),
            TextInput::make('email')->email()->required()->placeholder(auth()->user()->email),
            TextInput::make('contact')->visible(auth()->user()->user_type != 'admin')->placeholder(
                auth()->user()->user_type == 'client' ? auth()->user()->client_information->contact_number : (auth()->user()->service_provider->phone_number ?? '')
            ),
            TextInput::make('zipcode')->required()->visible(auth()->user()->user_type == 'client')->placeholder(
                auth()->user()->user_type == 'client' ? auth()->user()->client_information->zipcode : ''
            ),

        ];
    }

    public function update()
    {
        $this->validate([
            'attachment' => 'required',

        ]);

        $data = auth()->user();
        $profile = UserProfile::where('user_id', $data->id)->first();

        foreach ($this->attachment as $key => $value) {
            $data->update([
                'name' => $this->name,
                'email' => $this->email,
            ]);

            if (auth()->user()->user_type == 'client') {
                $data->client_information->update([
                    'contact_number' => $this->contact != null ? $this->contact : $data->client_information->contact_number,
                    'zipcode' => $this->zipcode != null ? $this->zipcode : $data->client_information->zipcode,
                ]);
            } elseif (auth()->user()->user_type == 'service provider') {
                $data->service_provider->update([
                    'phone_number' => $this->contact != null ? $this->contact : $data->service_provider->phone_number,
                ]);
            }

            if ($profile == null) {
                UserProfile::create([
                    'user_id' => auth()->user()->id,
                    'user_profile_path' => $value->store('User Profile', 'public'),
                ]);
            } else {
                $profile->update([
                    'user_profile_path' => $value->store('User Profile', 'public'),
                ]);
            }

        }

        return redirect()->route('dashboard');

    }
}
