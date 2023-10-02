<?php

namespace App\Http\Livewire\Provider;

use App\Models\Notification;
use Livewire\Component;

class ProviderNotification extends Component
{
    public function render()
    {
        return view('livewire.provider.provider-notification', [
            'notifications' => Notification::where('receiver_id', auth()->user()->id)->orderByRaw("CASE
            WHEN read_at = 'not_read' THEN 1
            ELSE 2
            END")->orderBy('created_at', 'DESC')->get()->take(5),
            'not_read' => Notification::where('receiver_id', auth()->user()->id)->where('read_at', 'not_read')->count(),
        ]);
    }

    public function read($id)
    {
        $data = Notification::where('id', $id)->first();
        $data->update([
            'read_at' => now(),
        ]);
    }
}