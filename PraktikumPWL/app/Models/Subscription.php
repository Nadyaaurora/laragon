<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Subscription extends Model
{
    use SoftDeletes;
    
    protected $fillable = [
        'user_id',
        'name',
        'price',
        'start_date',
        'end_date'
    ];


    protected static function boot()
    {
        parent::boot();

        static::creating(function ($subscription) {
            $subscription->price = rand(50000, 900000);
        });
    }
}

