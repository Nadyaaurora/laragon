<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Order extends Model
{
    use SoftDeletes;

    protected $fillable = [
        'number',
        'customer_id',
        'total_price',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }
}

