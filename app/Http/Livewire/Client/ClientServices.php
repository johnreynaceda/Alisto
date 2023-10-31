<?php

namespace App\Http\Livewire\Client;

use App\Models\Service;
use App\Models\ServiceCategory;
use Livewire\Component;

class ClientServices extends Component
{
    public $category_name;
    public $catergory_id;
    public $book_modal = false;

    public function mount()
    {
        $this->category_name = ServiceCategory::where('id', request('id'))->first()->name;
        $this->catergory_id = request('id');
    }
    public function render()
    {
        return view('livewire.client.client-services', [
            'services' => Service::where('service_category_id', $this->catergory_id)->whereHas('service_provider', function ($record) {
                $record->where('is_approved', 1);
            })->get(),
        ]);
    }

    public function bookService($service_id)
    {
        $this->book_modal = true;
    }
}
