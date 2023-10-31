<?php

namespace App\Http\Livewire\Client;

use Livewire\Component;
use App\Models\Service;
use App\Models\ServiceCategory;

class LocationServices extends Component
{

    public $category_name;
    public $catergory_id;

    public $location_id;
    public $book_modal = false;

    public function mount()
    {
        $this->category_name = ServiceCategory::where('id', request('servicesid'))->first()->name;
        $this->catergory_id = request('servicesid');
        $this->location_id = request('id');
    }
    public function render()
    {
        return view('livewire.client.location-services', [
            'services' => Service::where('service_category_id', $this->catergory_id)->whereHas('service_provider', function ($record) {
                $record->where('is_approved', 1)->whereHas('location', function ($location) {
                    $location->where('id', $this->location_id);
                });
            })->get(),
        ]);
    }

    public function bookService($service_id)
    {
        $this->book_modal = true;
    }
}
