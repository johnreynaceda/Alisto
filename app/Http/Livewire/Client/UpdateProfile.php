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
use Livewire\WithFileUploads;

class UpdateProfile extends Component implements Forms\Contracts\HasForms
{
    use WithFileUploads;
    use Forms\Concerns\InteractsWithForms;

    public $name, $email, $attachment;


    public function render()
    {
        $this->name = auth()->user()->name;
        $this->email = auth()->user()->email;
        return view('livewire.client.update-profile');
    }

    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('attachment')->reactive()->required(),
            TextInput::make('name')->required()->placeholder(auth()->user()->name),
            TextInput::make('email')->email()->required()->placeholder(auth()->user()->email),

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