<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Loading extends Model
{
    use HasFactory;

    protected $fillable = [
        'receiving',
        'name',
        'number',
        'charge',
        'issue',
        'remarks',
        'place',
    ];
}
