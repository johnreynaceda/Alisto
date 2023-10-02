<?php

namespace App\Http\Livewire\Client;

use App\Models\Location;
use App\Models\ServiceCategory;
use Livewire\Component;

class LocationService extends Component
{
    public $location_id;
    public $location_name;

    public function mount()
    {

        $this->location_id = request('id');
        $this->location_name = Location::where('id', $this->location_id)->first()->location;

    }
    public function render()
    {
        return view('livewire.client.location-service', [
            'providers' => ServiceCategory::whereHas('service_providers', function ($record) {
                $record->where('location_id', $this->location_id);
            })->get(),
        ]);
    }
}