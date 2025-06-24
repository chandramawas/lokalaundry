<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookingMachine extends Model
{
    protected $fillable = ['booking_id', 'machine_id'];

    public function booking()
    {
        return $this->belongsTo(Booking::class);
    }

    public function machine()
    {
        return $this->belongsTo(Machine::class);
    }
}
