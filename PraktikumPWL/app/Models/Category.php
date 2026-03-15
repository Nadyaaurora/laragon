<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        "name",
        "slug",
        "members"
    ];

    protected $casts = [
        'members' => 'array',
    ];
}

