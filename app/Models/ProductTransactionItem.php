<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductTransactionItem extends Model
{
    protected $fillable = ['product_transaction_id', 'product_id', 'quantity', 'price'];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function transaction()
    {
        return $this->belongsTo(ProductTransaction::class, 'product_transaction_id');
    }
}