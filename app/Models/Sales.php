<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Constants\SalesCommon;

class Sales extends Model
{
    use HasFactory;

    protected $fillable = [
        'receiving',
        'name',
        'number',
        'content',
        'charge',
    ];

    public function scopeSortOrder($query, $sortOrder)
    {
        if($sortOrder === null || $sortOrder === SalesCommon::SORT_ORDER['receiving']) {
            return $query->orderBy('receiving', 'asc');
        }
        if($sortOrder === SalesCommon::SORT_ORDER['name']) {
            return $query->orderBy('name', 'asc');
        }
        if($sortOrder === SalesCommon::SORT_ORDER['charge']) {
            return $query->orderBy('charge', 'asc');
        }
    }
    
}
