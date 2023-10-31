<?php

namespace App\Http\Livewire\Provider;

use App\Mail\AlistoNotification;
use App\Models\ClientAppointment;
use App\Models\Notification;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\User;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Fieldset;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Illuminate\Support\Facades\Mail;

class ProviderDashboard extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    public $view_modal = false;
    public $view_details;

    protected function getTableQuery(): Builder
    {
        return ClientAppointment::query()->where('status', 'pending')->where('service_provider_id', auth()->user()->service_provider->id);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('service.service_category.name')->label('SERVICE NAME')->searchable(),
            TextColumn::make('service.name')->label('CATEGORY SERVICE')->searchable(),
            TextColumn::make('user.name')->label('CLIENT NAME')->searchable(),
            TextColumn::make('user.client_information.contact_number')->label('CONTACT')->searchable(),
            ViewColumn::make('id')->label('VALID ID')->view('provider.filament.client'),
            TextColumn::make('appointment_date')->label('APPOINTMENT DATE')->formatStateUsing(
                function ($record) {
                    return Carbon::parse($record->appointment_date)->format('F d, Y h:i A');
                }
            )->searchable(),



        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('view')->label('View')->button()->color('warning')->icon('heroicon-o-eye')->action(
                function ($record) {
                    $this->view_details = $record;
                    $this->view_modal = true;
                }
            ),
            Action::make('approve')->label('Approve')->button()->color('success')->icon('heroicon-o-thumb-up')->action(
                function ($record) {
                    $description = $record->user->name . ' your Booking has been approved. Go to your Profile and click appointments to check it.';
                    $record->update([
                        'status' => 'approved',
                    ]);

                    $notif = Notification::create([
                        'sender_id' => $record->user_id,
                        'receiver_id' => $record->user_id,
                        'description' => $description,
                        'read_at' => 'not_read',
                    ]);

                    Mail::to($record->user->email)->send(new AlistoNotification($notif->description));
                    sweetalert()->addSuccess('Request Approved.');


                }
            ),
            Action::make('disapprove')->label('Disapprove')->button()->color('danger')->icon('heroicon-o-thumb-down')->action(
                function ($record) {
                    $description = $record->user->name . ' your Booking has been declined.';
                    $record->update([
                        'status' => 'declined',
                    ]);

                    $notif = Notification::create([
                        'sender_id' => $record->user_id,
                        'receiver_id' => $record->user_id,
                        'description' => $description,
                        'read_at' => 'not_read',
                    ]);
                    Mail::to($record->user->email)->send(new AlistoNotification($notif->description));
                    sweetalert()->addSuccess('Request Declined.');
                }
            ),
        ];
    }

    public function render()
    {
        return view('livewire.provider.provider-dashboard');
    }
}
