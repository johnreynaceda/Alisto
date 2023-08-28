<?php

namespace App\Http\Livewire;

use App\Models\Location;
use App\Models\ServiceCategory;
use App\Models\ServiceProvider;
use App\Models\User;
use Livewire\Component;

class BecomeProvider extends Component
{
    public $area, $category_id, $avg_project;

    public $provider_name, $email, $password, $confirm_password;
    public function render()
    {
        return view('livewire.become-provider', [
            'locations' => Location::all(),
            'services' => ServiceCategory::all(),
        ]);
    }

    public function updatedCategoryId()
    {
        $this->avg_project = ServiceCategory::where('id', $this->category_id)->first()->avg_project;
    }

    public function createAccount()
    {
        $this->validate([
            'provider_name' => 'required',
            'email' => 'required|email',
            'password' => 'required',
            'confirm_password' => 'required|same:password'
        ]);

        $user = User::create([
            'name' => $this->provider_name,
            'email' => $this->email,
            'password' => $this->password,
            'user_type' => 'service_provider'
        ]);

        ServiceProvider::create([
            'user_id' => $user->id,
            'location_id' => $this->area,
            'service_category_id' => $this->category_id,
        ]);

        return redirect()->route('login');
    }




}