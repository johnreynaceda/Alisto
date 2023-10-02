<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function service_category()
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function service_provider()
    {
        return $this->belongsTo(ServiceProvider::class);
    }

    public function client_informations()
    {
        return $this->hasMany(ClientInformation::class);
    }
}