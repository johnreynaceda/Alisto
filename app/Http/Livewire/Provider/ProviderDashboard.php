<?php

namespace App\Http\Livewire\Provider;

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

class ProviderDashboard extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return ClientAppointment::query()->where('status', 'pending');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('service.name')->label('SERVICE NAME')->searchable(),
            TextColumn::make('service.service_category.name')->label('CATEGORY NAME')->searchable(),
            TextColumn::make('user.name')->label('CLIENT NAME')->searchable(),
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
            Action::make('approve')->label('Approve')->button()->color('success')->icon('heroicon-o-thumb-up')->action(
                function ($record) {
                    $description = $record->user->name . ' your Booking has been approved.';
                    $record->update([
                        'status' => 'approved',
                    ]);

                    Notification::create([
                        'sender_id' => $record->user_id,
                        'receiver_id' => $record->user_id,
                        'description' => $description,
                        'read_at' => 'not_read',
                    ]);



                }
            ),
            Action::make('disapprove')->label('Disapprove')->button()->color('danger')->icon('heroicon-o-thumb-down')->action(
                function ($record) {
                    $description = $record->user->name . ' your Booking has been declined.';
                    $record->update([
                        'status' => 'declined',
                    ]);

                    Notification::create([
                        'sender_id' => $record->user_id,
                        'receiver_id' => $record->user_id,
                        'description' => $description,
                        'read_at' => 'not_read',
                    ]);
                }
            ),
        ];
    }

    public function render()
    {
        return view('livewire.provider.provider-dashboard');
    }
}