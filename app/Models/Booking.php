<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'user_id',
        'outlet_id',
        'date',
        'session_start',
        'session_end'
    ];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function bookingMachines()
    {
        return $this->hasMany(BookingMachine::class);
    }
}
