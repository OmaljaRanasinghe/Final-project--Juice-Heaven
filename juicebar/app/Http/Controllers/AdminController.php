<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Product;
use App\Models\Fruit;
use App\Models\CustomJuice;

class AdminController extends Controller
{
    public function dashboard()
    {
        $totalUsers = User::where('role', 'customer')->count();
        $totalOrders = Order::count();
        $totalRevenue = Order::sum('total');
        $recentOrders = Order::with('user')->latest()->take(5)->get();
        
        // Fruit and custom juice statistics
        $totalFruits = Fruit::count();
        $availableFruits = Fruit::where('is_available', true)->count();
        $totalCustomJuices = CustomJuice::count();
        $popularFruits = $this->getPopularFruits();
        
        return view('admin.dashboard', compact(
            'totalUsers', 'totalOrders', 'totalRevenue', 'recentOrders',
            'totalFruits', 'availableFruits', 'totalCustomJuices', 'popularFruits'
        ));
    }
    
    private function getPopularFruits()
    {
        // Get popular fruits from custom juice orders
        $customJuices = CustomJuice::all();
        $fruitUsage = [];
        
        foreach ($customJuices as $juice) {
            foreach ($juice->selected_fruits as $fruitId => $quantity) {
                if (!isset($fruitUsage[$fruitId])) {
                    $fruitUsage[$fruitId] = 0;
                }
                $fruitUsage[$fruitId] += $quantity;
            }
        }
        
        // Get top 3 most used fruits
        arsort($fruitUsage);
        $topFruitIds = array_slice(array_keys($fruitUsage), 0, 3, true);
        
        $popularFruits = [];
        foreach ($topFruitIds as $fruitId) {
            $fruit = Fruit::find($fruitId);
            if ($fruit) {
                $popularFruits[] = [
                    'fruit' => $fruit,
                    'usage_count' => $fruitUsage[$fruitId]
                ];
            }
        }
        
        return $popularFruits;
    }
}
