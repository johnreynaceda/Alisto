<?php

namespace App\Http\Livewire\Provider;

use App\Models\Notification;
use Carbon\Carbon;
use Livewire\Component;
use App\Models\ServiceCategory;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\Fieldset;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Actions\Action;
use Filament\Forms\Components\TextInput;
use App\Models\ClientAppointment;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Livewire\WithFileUploads;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ViewColumn;
use Filament\Tables\Columns\BadgeColumn;

class AppointmentList extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return ClientAppointment::query()->whereNotIn('status', ['pending', 'done']);
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
            BadgeColumn::make('status')->label('STATUS')
                ->enum([
                    'cancelled' => 'Cancelled',
                    'approved' => 'Approved',

                ])->colors([
                        'danger' => 'cancelled',
                        'success' => 'approved',
                    ])



        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('done')->label('Done')->button()->color('gray')->icon('heroicon-o-thumb-up')->visible(function ($record) {
                return $record->status != 'cancelled';
            })->action(
                    function ($record) {
                        $description = $record->user->name . ', the service has been successfully done.';
                        $record->update([
                            'status' => 'done',
                        ]);

                        Notification::create([
                            'sender_id' => $record->user_id,
                            'receiver_id' => $record->user_id,
                            'description' => $description,
                            'read_at' => 'not_read',
                        ]);


                    }
                ),
            Action::make('view')->label('View')->button()->color('warning')->visible(function ($record) {
                return $record->status != 'cancelled';
            })->icon('heroicon-o-eye'),
        ];
    }

    public function render()
    {
        return view('livewire.provider.appointment-list');
    }
}