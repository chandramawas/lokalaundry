<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TopUp extends Model
{
    protected $fillable = [
        'user_id',
        'amount',
        'status',
        'order_id',
        'payment_type',
        'transaction_id',
        'snap_token'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
