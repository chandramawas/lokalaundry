<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTransaction extends Model
{
    protected $fillable = ['code', 'user_id', 'subtotal', 'status'];

    public function items()
    {
        return $this->hasMany(ProductTransactionItem::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
