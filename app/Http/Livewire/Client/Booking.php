<?php

namespace App\Http\Livewire\Client;

use App\Models\ClientAppointment;
use App\Models\Notification;
use App\Models\Service;
use App\Models\ServiceProvider;
use Livewire\Component;

class Booking extends Component
{
    public $service_id;
    public $date, $time, $information;

    public $events = [];

    public function mount()
    {
        $this->service_id = request('id');

    }
    public function render()
    {

        $this->events = ClientAppointment::where('status', 'approved')->where('service_id', $this->service_id)->get()->map(
            function ($event) {
                return [
                    'id' => $event->id,
                    'title' => $event->service->name,
                    'description' => $event->information,
                    'date' => $event->appointment_date,
                    'time' => $event->appointment_date,
                ];
            }
        )->tojson();

        return view('livewire.client.booking', [
            'service' => Service::where('id', $this->service_id)->first(),
        ]);
    }


    public function submitBooking()
    {
        $data = Service::where('id', $this->service_id)->first();
        ClientAppointment::create([
            'service_id' => $this->service_id,
            'service_provider_id' => $data->service_provider_id,
            'user_id' => auth()->user()->id,
            'appointment_date' => \Carbon\Carbon::parse(
                $this->date . '' . $this->time
            )->format('Y-m-d\TH:i:s'),
            'information' => $this->information,
        ]);
        $receiver = ServiceProvider::where('id', $data->service_provider_id)->first()->user_id;
        Notification::create([
            'sender_id' => auth()->user()->id,
            'receiver_id' => $receiver,
            'description' => auth()->user()->name . ' has sent you a booking. Go to Dashboard to manage booking.',
            'read_at' => 'not_read',
        ]);
        sweetalert()->addSuccess('Your Booking has been submitted');

        return redirect()->route('client.dashboard');

    }
}