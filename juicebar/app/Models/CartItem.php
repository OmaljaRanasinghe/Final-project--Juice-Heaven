<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    protected $fillable = [
        'user_id',
        'product_id',
        'custom_juice_id',
        'quantity'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function customJuice()
    {
        return $this->belongsTo(CustomJuice::class);
    }

    public function getTotalPriceAttribute()
    {
        if ($this->custom_juice_id) {
            return $this->quantity * $this->customJuice->total_price;
        }
        return $this->quantity * $this->product->price;
    }

    public function getNameAttribute()
    {
        if ($this->custom_juice_id) {
            return $this->customJuice->name;
        }
        return $this->product->name;
    }

    public function getDescriptionAttribute()
    {
        if ($this->custom_juice_id) {
            $fruits = $this->customJuice->getSelectedFruitsWithDetails();
            $fruitNames = collect($fruits)->pluck('fruit.name')->join(', ');
            return "Custom blend with {$fruitNames}";
        }
        return $this->product->description;
    }
}
