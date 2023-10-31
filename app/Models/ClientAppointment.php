<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientAppointment extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service_provider()
    {
        return $this->belongsTo(ServiceProvider::class);
    }

    public function feedback()
    {
        return $this->hasOne(Feedback::class);
    }
}
