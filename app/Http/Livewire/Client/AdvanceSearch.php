<?php

namespace App\Http\Livewire\Client;

use App\Models\Location;
use App\Models\Service;
use Livewire\Component;

class AdvanceSearch extends Component
{
    public $search;
    public $location_id;
    public $services_modal = false;


    public function updatedSearch()
    {
        $this->services_modal = true;
    }
    public function render()
    {
        $this->location_id = Location::where('zip_code', (auth()->user()->client_information->zipcode ?? 1))->first()->id ?? 1;
        return view('livewire.client.advance-search', [
            // 'services' => Service::where(function ($query) {
            //     $query->where(function ($categoryQuery) {
            //         // Search for service category names
            //         $categoryQuery->whereHas('service_category', function ($subQuery) {
            //             $subQuery->where('name', 'like', '%' . $this->search . '%');
            //         });
            //     })->where('name', 'like', '%' . $this->search . '%');
            // })->get(),

            'services' => Service::whereHas('service_provider', function ($provider) {
                $provider->where('location_id', $this->location_id);
            })->get(),
        ]);
    }
}
