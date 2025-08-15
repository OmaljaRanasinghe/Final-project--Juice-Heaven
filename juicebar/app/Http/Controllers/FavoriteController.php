<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\CustomJuice;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class FavoriteController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        $favoriteProducts = $user->favoriteProducts()->where('is_active', true)->get();
        $favoriteCustomJuices = $user->favoriteCustomJuices()->get();
        $cartCount = 0;
        
        if ($user) {
            $cartCount = \App\Models\CartItem::where('user_id', $user->id)->sum('quantity');
        }
        
        return view('favorites', compact('favoriteProducts', 'favoriteCustomJuices', 'cartCount'));
    }

    public function toggle(Request $request): JsonResponse
    {
        $user = auth()->user();
        $productId = $request->input('product_id');
        
        $product = Product::findOrFail($productId);
        
        $isFavorited = $user->favoriteProducts()->where('product_id', $productId)->exists();
        
        if ($isFavorited) {
            $user->favoriteProducts()->detach($productId);
            $message = 'Removed from favorites';
            $favorited = false;
        } else {
            $user->favoriteProducts()->attach($productId);
            $message = 'Added to favorites';
            $favorited = true;
        }
        
        return response()->json([
            'success' => true,
            'message' => $message,
            'favorited' => $favorited
        ]);
    }

    public function toggleCustomJuice(Request $request): JsonResponse
    {
        $user = auth()->user();
        $customJuiceId = $request->input('custom_juice_id');
        
        $customJuice = CustomJuice::findOrFail($customJuiceId);
        
        $isFavorited = $user->favoriteCustomJuices()->where('custom_juice_id', $customJuiceId)->exists();
        
        if ($isFavorited) {
            $user->favoriteCustomJuices()->detach($customJuiceId);
            $message = 'Removed custom juice from favorites';
            $favorited = false;
        } else {
            $user->favoriteCustomJuices()->attach($customJuiceId);
            $message = 'Added custom juice to favorites';
            $favorited = true;
        }
        
        return response()->json([
            'success' => true,
            'message' => $message,
            'favorited' => $favorited
        ]);
    }
}
