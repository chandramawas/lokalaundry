<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MachineType extends Model
{
    protected $fillable = ['name', 'type', 'capacity', 'price'];

    public function machines()
    {
        return $this->hasMany(Machine::class);
    }
}
