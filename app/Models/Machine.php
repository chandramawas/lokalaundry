<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    protected $fillable = ['outlet_id', 'machine_type_id', 'number', 'status'];

    public function outlet()
    {
        return $this->belongsTo(Outlet::class);
    }

    public function machineType()
    {
        return $this->belongsTo(MachineType::class);
    }

    public function bookingMachines()
    {
        return $this->hasMany(BookingMachine::class);
    }
}
