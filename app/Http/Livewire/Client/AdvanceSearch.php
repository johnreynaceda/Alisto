<?php

namespace App\Http\Livewire\Client;

use App\Models\Service;
use Livewire\Component;

class AdvanceSearch extends Component
{
    public $search;
    public function render()
    {
        return view('livewire.client.advance-search', [
            'services' => Service::where(function ($query) {
                $query->where(function ($categoryQuery) {
                    // Search for service category names
                    $categoryQuery->whereHas('service_category', function ($subQuery) {
                        $subQuery->where('name', 'like', '%' . $this->search . '%');
                    });
                })->orWhere(function ($serviceQuery) {
                    // Search for service names
                    $serviceQuery->whereHas('service_provider', function ($record) {
                        $record->whereHas('location', function ($locationQuery) {
                            $locationQuery->where('zip_code', auth()->user()->client_information->zipcode);
                        });
                    })->where('name', 'like', '%' . $this->search . '%');
                });
            })->get(),
        ]);
    }
}