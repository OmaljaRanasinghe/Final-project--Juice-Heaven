<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\CartItem;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function index()
    {
        $cartItems = CartItem::with(['product', 'customJuice'])
            ->where('user_id', Auth::id())
            ->get();

        $subtotal = $cartItems->sum('total_price');
        $deliveryFee = $subtotal >= 7500 ? 0 : 1497; // Free delivery for orders above LKR 7,500
        $total = $subtotal + $deliveryFee;

        return view('cart', compact('cartItems', 'subtotal', 'deliveryFee', 'total'));
    }

    public function add(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'quantity' => 'integer|min:1|max:99'
        ]);

        $product = Product::findOrFail($request->product_id);
        $quantity = $request->quantity ?? 1;

        $cartItem = CartItem::where('user_id', Auth::id())
            ->where('product_id', $product->id)
            ->first();

        if ($cartItem) {
            $cartItem->quantity += $quantity;
            $cartItem->save();
            $message = "Added {$quantity} more {$product->name} to your cart!";
        } else {
            CartItem::create([
                'user_id' => Auth::id(),
                'product_id' => $product->id,
                'quantity' => $quantity
            ]);
            $message = "{$product->name} added to your cart!";
        }

        $cartCount = CartItem::where('user_id', Auth::id())->sum('quantity');

        return response()->json([
            'success' => true,
            'message' => $message,
            'cart_count' => $cartCount
        ]);
    }

    public function update(Request $request, CartItem $cartItem)
    {
        if ($cartItem->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        $request->validate([
            'quantity' => 'required|integer|min:1|max:99'
        ]);

        $cartItem->update(['quantity' => $request->quantity]);

        return response()->json([
            'success' => true,
            'message' => 'Cart updated successfully!'
        ]);
    }

    public function remove(CartItem $cartItem)
    {
        if ($cartItem->user_id !== Auth::id()) {
            return response()->json(['error' => 'Unauthorized'], 403);
        }

        // Get the name based on whether it's a regular product or custom juice
        if ($cartItem->custom_juice_id) {
            $itemName = $cartItem->customJuice->name;
        } else {
            $itemName = $cartItem->product->name;
        }

        $cartItem->delete();

        $cartCount = CartItem::where('user_id', Auth::id())->sum('quantity');

        return response()->json([
            'success' => true,
            'message' => "{$itemName} removed from cart",
            'cart_count' => $cartCount
        ]);
    }

    public function clear()
    {
        CartItem::where('user_id', Auth::id())->delete();

        return response()->json([
            'success' => true,
            'message' => 'Cart cleared successfully!',
            'cart_count' => 0
        ]);
    }

    public function count()
    {
        $count = CartItem::where('user_id', Auth::id())->sum('quantity');
        return response()->json(['count' => $count]);
    }

    public function checkout()
    {
        $cartItems = CartItem::with(['product', 'customJuice'])
            ->where('user_id', Auth::id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $subtotal = $cartItems->sum('total_price');
        $deliveryFee = $subtotal >= 7500 ? 0 : 1497; // Free delivery for orders above LKR 7,500
        $tax = $subtotal * 0.08; // 8% tax
        $total = $subtotal + $deliveryFee + $tax;

        return view('checkout', compact('cartItems', 'subtotal', 'deliveryFee', 'tax', 'total'));
    }

    public function processCheckout(Request $request)
    {
        $request->validate([
            'billing_name' => 'required|string|max:255',
            'billing_email' => 'required|email|max:255',
            'billing_phone' => 'required|string|max:20',
            'billing_address' => 'required|string|max:500',
            'billing_city' => 'required|string|max:100',
            'billing_state' => 'required|string|max:100',
            'billing_zip' => 'required|string|max:20',
            'delivery_type' => 'required|in:delivery,pickup',
            'delivery_address' => 'required_if:delivery_type,delivery|string|max:500',
            'delivery_city' => 'required_if:delivery_type,delivery|string|max:100',
            'delivery_state' => 'required_if:delivery_type,delivery|string|max:100',
            'delivery_zip' => 'required_if:delivery_type,delivery|string|max:20',
            'payment_method' => 'required|in:card,paypal,apple_pay,google_pay',
            'special_instructions' => 'nullable|string|max:1000',
        ]);

        // For demo purposes, we'll just simulate payment processing
        // In a real application, you would integrate with a payment processor like Stripe

        try {
            // Clear the cart after successful "payment"
            CartItem::where('user_id', Auth::id())->delete();

            return redirect()->route('dashboard')->with('success', '🎉 Order placed successfully! Your fresh juices are being prepared.');
        } catch (\Exception $e) {
            return back()->with('error', 'Payment processing failed. Please try again.');
        }
    }
}
