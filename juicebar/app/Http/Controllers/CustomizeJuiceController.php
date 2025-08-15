<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fruit;
use App\Models\CustomJuice;
use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class CustomizeJuiceController extends Controller
{
    public function index()
    {
        $fruits = Fruit::available()->get();
        $cartCount = CartItem::where('user_id', Auth::id())->sum('quantity');
        $userName = Auth::user()->name;
        
        return view('customize', compact('fruits', 'cartCount', 'userName'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'selected_fruits' => 'required|array|min:1',
            'selected_fruits.*' => 'integer|min:1|max:5',
            'size' => 'required|in:small,medium,large',
            'sugar_level' => 'required|in:none,low,medium,high',
            'ice_level' => 'required|in:none,light,regular,extra',
            'add_protein' => 'boolean',
            'add_vitamins' => 'boolean',
        ]);

        // Calculate price based on fruits, size, and add-ons
        $fruitIds = array_keys($request->selected_fruits);
        $fruits = Fruit::whereIn('id', $fruitIds)->get()->keyBy('id');
        
        $basePrice = 0;
        $fruitNames = [];
        foreach ($request->selected_fruits as $fruitId => $quantity) {
            if ($fruits->has($fruitId)) {
                $fruit = $fruits[$fruitId];
                $basePrice += $fruit->price_per_serving * $quantity;
                $fruitNames[] = $fruit->name;
            }
        }

        // Size multipliers
        $sizeMultipliers = ['small' => 0.8, 'medium' => 1.0, 'large' => 1.3];
        $totalPrice = $basePrice * $sizeMultipliers[$request->size];

        // Add-on prices (converted to LKR)
        if ($request->add_protein) $totalPrice += 600; // LKR 600 for protein (was $2.00)
        if ($request->add_vitamins) $totalPrice += 450; // LKR 450 for vitamins (was $1.50)

        // Calculate dominant color
        $dominantColor = $this->calculateDominantColor($request->selected_fruits, $fruits);

        // Create custom juice record
        $customJuice = CustomJuice::create([
            'name' => $request->name,
            'selected_fruits' => $request->selected_fruits,
            'size' => $request->size,
            'sugar_level' => $request->sugar_level,
            'ice_level' => $request->ice_level,
            'add_protein' => $request->boolean('add_protein'),
            'add_vitamins' => $request->boolean('add_vitamins'),
            'total_price' => $totalPrice,
            'dominant_color' => $dominantColor,
            'user_id' => Auth::id()
        ]);

        // Add to cart
        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('custom_juice_id', $customJuice->id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += 1;
            $cartItem->save();
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'product_id' => null, // Custom juice doesn't have product_id
                'custom_juice_id' => $customJuice->id,
                'quantity' => 1
            ]);
        }

        // Get updated cart count
        $cartCount = CartItem::where('user_id', Auth::id())->sum('quantity');

        return response()->json([
            'success' => true,
            'message' => "Your custom juice '{$request->name}' has been added to your cart!",
            'cart_count' => $cartCount,
            'juice' => [
                'id' => $customJuice->id,
                'name' => $request->name,
                'fruits' => implode(', ', $fruitNames),
                'size' => $request->size,
                'total_price' => number_format($totalPrice, 0),
                'color' => $dominantColor
            ]
        ]);
    }

    private function calculateDominantColor($selectedFruits, $fruits)
    {
        $colors = [];
        $totalQuantity = 0;
        
        foreach ($selectedFruits as $fruitId => $quantity) {
            if ($fruits->has($fruitId)) {
                $colors[] = [
                    'color' => $fruits[$fruitId]->color,
                    'weight' => $quantity
                ];
                $totalQuantity += $quantity;
            }
        }

        // Simple color mixing - return the color of the fruit with highest quantity
        $dominantColor = '#ff6b35'; // fallback orange
        $maxWeight = 0;
        
        foreach ($colors as $colorData) {
            if ($colorData['weight'] > $maxWeight) {
                $maxWeight = $colorData['weight'];
                $dominantColor = $colorData['color'];
            }
        }

        return $dominantColor;
    }
}
