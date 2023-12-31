<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'user_type',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    public function service_provider()
    {
        return $this->hasOne(ServiceProvider::class);
    }

    public function client_information()
    {
        return $this->hasOne(ClientInformation::class);
    }

    public function client_appointments()
    {
        return $this->hasMany(ClientAppointment::class);
    }

    public function user_profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function provider_credentials()
    {
        return $this->hasMany(ProviderCredential::class);
    }

}