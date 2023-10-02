<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ServiceProvider extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service_category()
    {
        return $this->belongsTo(ServiceCategory::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
}