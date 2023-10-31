<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function service_provider()
    {
        return $this->belongsTo(ServiceProvider::class);
    }

    public function client_appointment()
    {
        return $this->belongsTo(ClientAppointment::class);
    }
}
