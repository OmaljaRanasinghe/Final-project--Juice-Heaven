<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Fruit;

class FruitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fruits = [
            [
                'name' => 'Mango',
                'emoji' => '🥭',
                'color' => '#FFA500',
                'price_per_serving' => 1.50,
                'description' => 'Sweet tropical mango with rich, creamy texture',
                'nutritional_benefits' => ['Vitamin A', 'Vitamin C', 'Fiber', 'Antioxidants'],
                'is_available' => true,
                'stock_level' => 100
            ],
            [
                'name' => 'Berry Mix',
                'emoji' => '🫐',
                'color' => '#8A2BE2',
                'price_per_serving' => 2.00,
                'description' => 'Antioxidant-rich blend of blueberries, strawberries, and raspberries',
                'nutritional_benefits' => ['Antioxidants', 'Vitamin C', 'Fiber', 'Folate'],
                'is_available' => true,
                'stock_level' => 80
            ],
            [
                'name' => 'Pineapple',
                'emoji' => '🍍',
                'color' => '#FFD700',
                'price_per_serving' => 1.25,
                'description' => 'Tropical pineapple with natural enzymes',
                'nutritional_benefits' => ['Vitamin C', 'Manganese', 'Enzymes', 'Bromelain'],
                'is_available' => true,
                'stock_level' => 90
            ],
            [
                'name' => 'Apple',
                'emoji' => '🍎',
                'color' => '#FF4500',
                'price_per_serving' => 1.00,
                'description' => 'Crisp, fresh apple with natural sweetness',
                'nutritional_benefits' => ['Fiber', 'Vitamin C', 'Potassium', 'Quercetin'],
                'is_available' => true,
                'stock_level' => 120
            ],
            [
                'name' => 'Orange',
                'emoji' => '🍊',
                'color' => '#FF8C00',
                'price_per_serving' => 1.20,
                'description' => 'Juicy oranges packed with vitamin C',
                'nutritional_benefits' => ['Vitamin C', 'Folate', 'Potassium', 'Flavonoids'],
                'is_available' => true,
                'stock_level' => 110
            ],
            [
                'name' => 'Spinach',
                'emoji' => '🥬',
                'color' => '#228B22',
                'price_per_serving' => 1.75,
                'description' => 'Fresh green spinach for detox and nutrients',
                'nutritional_benefits' => ['Iron', 'Vitamin K', 'Folate', 'Magnesium'],
                'is_available' => true,
                'stock_level' => 70
            ],
            [
                'name' => 'Banana',
                'emoji' => '🍌',
                'color' => '#FFFF00',
                'price_per_serving' => 0.80,
                'description' => 'Creamy banana for natural sweetness',
                'nutritional_benefits' => ['Potassium', 'Vitamin B6', 'Fiber', 'Natural Sugars'],
                'is_available' => true,
                'stock_level' => 150
            ],
            [
                'name' => 'Kale',
                'emoji' => '🥬',
                'color' => '#006400',
                'price_per_serving' => 2.25,
                'description' => 'Superfood kale packed with nutrients',
                'nutritional_benefits' => ['Vitamin K', 'Vitamin C', 'Iron', 'Calcium'],
                'is_available' => true,
                'stock_level' => 60
            ],
            [
                'name' => 'Watermelon',
                'emoji' => '🍉',
                'color' => '#FF69B4',
                'price_per_serving' => 1.30,
                'description' => 'Hydrating watermelon perfect for summer',
                'nutritional_benefits' => ['Hydration', 'Lycopene', 'Vitamin A', 'Citrulline'],
                'is_available' => true,
                'stock_level' => 85
            ],
            [
                'name' => 'Lemon',
                'emoji' => '🍋',
                'color' => '#FFFF99',
                'price_per_serving' => 0.50,
                'description' => 'Zesty lemon for natural detox',
                'nutritional_benefits' => ['Vitamin C', 'Citric Acid', 'Flavonoids', 'Detox'],
                'is_available' => true,
                'stock_level' => 200
            ]
        ];

        foreach ($fruits as $fruit) {
            Fruit::create($fruit);
        }
    }
}
