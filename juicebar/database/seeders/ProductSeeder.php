<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = [
            [
                'name' => 'Tropical Mango',
                'description' => 'Sweet and creamy tropical mango juice packed with vitamins',
                'price' => 4.99,
                'emoji' => '🥭',
                'category' => 'tropical',
                'ingredients' => ['mango', 'vitamin-a'],
                'rating' => 4.8,
                'badge' => 'Fresh',
                'bg_color' => 'bg-gradient-to-br from-yellow-400 to-orange-500'
            ],
            [
                'name' => 'Green Goddess',
                'description' => 'Nutrient-packed blend of spinach, kale, apple, and lemon',
                'price' => 9.99,
                'emoji' => '🥗',
                'category' => 'green',
                'ingredients' => ['spinach', 'kale', 'apple', 'detox'],
                'rating' => 4.8,
                'badge' => 'Detox',
                'bg_color' => 'bg-gradient-to-br from-green-400 to-emerald-500'
            ],
            [
                'name' => 'Berry Bliss',
                'description' => 'Antioxidant-rich blend of strawberries, blueberries, and mint',
                'price' => 10.99,
                'emoji' => '🍓',
                'category' => 'berry',
                'ingredients' => ['strawberry', 'blueberry', 'raspberry', 'antioxidants'],
                'rating' => 4.7,
                'badge' => 'Antioxidant',
                'bg_color' => 'bg-gradient-to-br from-pink-400 to-purple-500'
            ],
            [
                'name' => 'Orange Sunrise',
                'description' => 'Classic citrus juice loaded with Vitamin C and natural sweetness',
                'price' => 3.49,
                'emoji' => '🍊',
                'category' => 'citrus',
                'ingredients' => ['orange', 'vitamin-c', 'citrus'],
                'rating' => 4.9,
                'badge' => 'Classic',
                'bg_color' => 'bg-gradient-to-br from-orange-400 to-yellow-500'
            ],
            [
                'name' => 'Pineapple Paradise',
                'description' => 'Sweet and tangy tropical pineapple juice with natural enzymes',
                'price' => 4.49,
                'emoji' => '🍍',
                'category' => 'tropical',
                'ingredients' => ['pineapple', 'enzymes', 'tropical'],
                'rating' => 4.6,
                'badge' => 'Tropical',
                'bg_color' => 'bg-gradient-to-br from-yellow-400 to-orange-400'
            ],
            [
                'name' => 'Purple Power',
                'description' => 'Antioxidant powerhouse with blueberries and grapes',
                'price' => 5.49,
                'emoji' => '🫐',
                'category' => 'berry',
                'ingredients' => ['blueberry', 'grape', 'antioxidants'],
                'rating' => 4.6,
                'badge' => 'Power',
                'bg_color' => 'bg-gradient-to-br from-purple-400 to-indigo-500'
            ],
            [
                'name' => 'Watermelon Fresh',
                'description' => 'Refreshing and hydrating summer fruit juice perfect for hot days',
                'price' => 3.99,
                'emoji' => '🍉',
                'category' => 'tropical',
                'ingredients' => ['watermelon', 'hydrating', 'summer'],
                'rating' => 4.5,
                'badge' => 'Hydrating',
                'bg_color' => 'bg-gradient-to-br from-red-400 to-pink-500'
            ],
            [
                'name' => 'Lemon Lime Zest',
                'description' => 'Zesty combination of fresh lemons and limes with natural tang',
                'price' => 3.79,
                'emoji' => '🍋',
                'category' => 'citrus',
                'ingredients' => ['lemon', 'lime', 'vitamin-c', 'citrus'],
                'rating' => 4.4,
                'badge' => 'Zesty',
                'bg_color' => 'bg-gradient-to-br from-lime-400 to-yellow-400'
            ]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}
