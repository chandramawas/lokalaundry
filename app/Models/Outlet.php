<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Outlet extends Model
{
    protected $fillable = [
        'name',
        'address',
        'city',
        'phone',
        'session_duration',
        'session_gap'
    ];

    public function machines()
    {
        return $this->hasMany(Machine::class);
    }

    public function bookings()
    {
        return $this->hasMany(Booking::class);
    }
}
