<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'emoji',
        'category',
        'ingredients',
        'rating',
        'badge',
        'bg_color',
        'image',
        'is_active'
    ];

    protected $casts = [
        'ingredients' => 'array',
        'price' => 'decimal:2',
        'rating' => 'decimal:1',
        'is_active' => 'boolean'
    ];

    public function cartItems()
    {
        return $this->hasMany(CartItem::class);
    }

    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'user_favorites')->withTimestamps();
    }
}
