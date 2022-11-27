<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Version extends Model
{

    protected $fillable = [
        'title', 'release_date'
    ];

    protected $dates = [
        'release_date'
    ];

    protected $casts = [
        'release_date' => 'date:Y-m-d'
    ];

    protected $hidden = [
        'created_at', 'updated_at'
    ];
}
