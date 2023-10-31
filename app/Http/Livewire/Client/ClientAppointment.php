<?php

namespace App\Http\Livewire\Client;

use App\Mail\AlistoNotification;
use App\Models\Feedback;
use App\Models\Notification;
use App\Models\ServiceProvider;
use Livewire\Component;
use App\Models\ClientAppointment as appointmentModel;
use Filament\Forms\Components\Textarea;
use Filament\Forms;
use Illuminate\Contracts\View\View;
use App\Mail\AppointmentNotification;
use Illuminate\Support\Facades\Mail;
use DB;

class ClientAppointment extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    public $feedback_modal = false;
    public $appointment_id;
    public $feedback;

    public $rating = 0;

    public function rate($value)
    {
        $this->rating = $value;
    }

    public function render()
    {
        return view('livewire.client.client-appointment', [
            'appointments' => appointmentModel::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->get(),
        ]);
    }

    public function cancelAppointment($id)
    {
        $data = appointmentModel::where('id', $id)->first();
        $data->update([
            'status' => 'cancelled',
        ]);

        $receiver = ServiceProvider::where('id', $data->service_provider_id)->first()->user_id;
        Notification::create([
            'sender_id' => auth()->user()->id,
            'receiver_id' => $receiver,
            'description' => auth()->user()->name . ' appointment has been cancelled.',
            'read_at' => 'not_read',
        ]);
        sweetalert()->addSuccess('Your Booking has been cancelled.');

    }


    protected function getFormSchema(): array
    {
        return [
            Textarea::make('feedback'),
        ];
    }

    public function feedback($id)
    {
        $this->feedback_id = $id;
        $this->feedback_modal = true;
    }

    public function submitFeedback()
    {
        $data = appointmentModel::where('id', $this->feedback_id)->first();

        DB::beginTransaction();
        Feedback::create([
            'user_id' => auth()->user()->id,
            'client_appointment_id' => $data->id,
            'service_provider_id' => $data->service_provider_id,
            'feedback' => $this->feedback,
            'rating' => $this->rating
        ]);

        $receiver = ServiceProvider::where('id', $data->service_provider_id)->first()->user_id;
        $email = ServiceProvider::where('id', $data->service_provider_id)->first()->user->email;
        $subject = ServiceProvider::where('id', $data->service_provider_id)->first();



        $notif = Notification::create([
            'sender_id' => auth()->user()->id,
            'receiver_id' => $receiver,
            'description' => auth()->user()->name . ' has been given a feedback',
            'read_at' => 'not_read',
        ]);



        Mail::to($email)->send(new AlistoNotification($notif->description));
        DB::commit();

        $this->feedback_modal = false;

        sweetalert()->addSuccess('Feedback has been saved');
    }
}
