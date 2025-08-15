<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Stripe\Stripe;
use Stripe\PaymentIntent;

class BillingController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function show()
    {
        $cartItems = CartItem::with(['product', 'customJuice'])
            ->where('user_id', Auth::id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $subtotal = $cartItems->sum('total_price');
        $tax = $subtotal * 0.08; // 8% tax
        $deliveryFee = $subtotal >= 15000 ? 0 : 1797; // Free delivery over LKR 15,000
        $total = $subtotal + $tax + $deliveryFee;

        return view('billing', compact('cartItems', 'subtotal', 'tax', 'deliveryFee', 'total'));
    }

    public function process(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|string',
            'address' => 'required|string',
            'city' => 'required|string',
            'zip' => 'required|string',
        ]);

        // Store billing data in session
        Session::put('billing_data', $request->all());

        // Get cart items and calculate total
        $cartItems = CartItem::with(['product', 'customJuice'])
            ->where('user_id', Auth::id())
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('cart')->with('error', 'Your cart is empty.');
        }

        $subtotal = $cartItems->sum('total_price');
        $tax = $subtotal * 0.08;
        $deliveryFee = $subtotal >= 15000 ? 0 : 1797; // Free delivery over LKR 15,000
        $total = $subtotal + $tax + $deliveryFee;

        return view('payment', [
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
            'tax' => $tax,
            'deliveryFee' => $deliveryFee,
            'total' => $total,
            'billingData' => $request->all()
        ]);
    }
}