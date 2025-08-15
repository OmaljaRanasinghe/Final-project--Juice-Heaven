<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::where('is_active', true)->get();
        $cartCount = 0;
        $favoriteProductIds = [];
        
        // Only get cart count and favorites if user is authenticated
        if (Auth::check()) {
            $cartCount = CartItem::where('user_id', Auth::id())->sum('quantity');
            $favoriteProductIds = Auth::user()->favoriteProducts()->pluck('products.id')->toArray();
        }
        
        // Debug output
        if ($products->isEmpty()) {
            dd('No products found in database');
        }
        
        return view('product', compact('products', 'cartCount', 'favoriteProductIds'));
    }
}
