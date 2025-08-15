<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Fruit extends Model
{
    protected $fillable = [
        'name',
        'emoji',
        'color',
        'price_per_serving',
        'description',
        'nutritional_benefits',
        'is_available',
        'stock_level'
    ];

    protected $casts = [
        'nutritional_benefits' => 'array',
        'price_per_serving' => 'decimal:2',
        'is_available' => 'boolean',
        'stock_level' => 'integer'
    ];

    public function scopeAvailable($query)
    {
        return $query->where('is_available', true)->where('stock_level', '>', 0);
    }
}
