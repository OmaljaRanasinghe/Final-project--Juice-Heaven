<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomJuice extends Model
{
    protected $fillable = [
        'name',
        'selected_fruits',
        'size',
        'sugar_level',
        'ice_level',
        'add_protein',
        'add_vitamins',
        'total_price',
        'dominant_color',
        'user_id'
    ];

    protected $casts = [
        'selected_fruits' => 'array',
        'add_protein' => 'boolean',
        'add_vitamins' => 'boolean',
        'total_price' => 'decimal:2'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function favoritedByUsers()
    {
        return $this->belongsToMany(User::class, 'custom_juice_favorites')->withTimestamps();
    }

    public function getSelectedFruitsWithDetails()
    {
        $fruitIds = array_keys($this->selected_fruits);
        $fruits = Fruit::whereIn('id', $fruitIds)->get()->keyBy('id');
        
        $result = [];
        foreach ($this->selected_fruits as $fruitId => $quantity) {
            if ($fruits->has($fruitId)) {
                $fruit = $fruits[$fruitId];
                $result[] = [
                    'fruit' => $fruit,
                    'quantity' => $quantity
                ];
            }
        }
        
        return $result;
    }
}
