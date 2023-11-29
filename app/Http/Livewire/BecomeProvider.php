<?php

namespace App\Http\Livewire;

use App\Models\Location;
use App\Models\ServiceCategory;
use App\Models\ServiceProvider;
use App\Models\User;
use Livewire\Component;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use Filament\Tables\Columns\ViewColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\TextInput;

class BecomeProvider extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    public $area, $category_id, $avg_project;

    public $provider_name, $email, $password, $confirm_password, $contact, $attachment;
    public function render()
    {
        return view('livewire.become-provider', [
            'locations' => Location::all(),
            'services' => ServiceCategory::all(),
        ]);
    }

    protected function getFormSchema(): array
    {
        return [
            TextInput::make('provider_name')->label('Service Provider Name')->required(),
            TextInput::make('email')->required(),
            TextInput::make('contact')->required()->mask(fn(TextInput\Mask $mask) => $mask->pattern('00000000000')),
            TextInput::make('password')->required()->password(),
            TextInput::make('confirm_password')->required()->password(),
            FileUpload::make('attachment')->label('Valid ID')->required()->helperText('Please enter a valid identification')
        ];
    }

    public function updatedCategoryId()
    {
        $this->avg_project = ServiceCategory::where('id', $this->category_id)->first()->avg_project;
    }

    public function createAccount()
    {
        $this->validate([
            'provider_name' => 'required',
            'email' => 'required|email|unique:users,email',
            'contact' => 'required|numeric|digits:11',
            'password' => 'required',
            'confirm_password' => 'required|same:password',
            'attachment' => 'required'
        ]);

        $user = User::create([
            'name' => $this->provider_name,
            'email' => $this->email,
            'password' => $this->password,
            'user_type' => 'service provider'
        ]);

        foreach ($this->attachment as $key => $value) {
            ServiceProvider::create([
                'user_id' => $user->id,
                'location_id' => $this->area,
                'phone_number' => $this->contact,
                'image_path' => $value->store('ServiceProvider', 'public'),
                'service_category_id' => $this->category_id,
            ]);
        }
        sleep(2);
        sweetalert()->addSuccess('Create Account Success');
        return redirect()->route('login');
    }




}
