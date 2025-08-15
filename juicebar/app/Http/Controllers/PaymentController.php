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

class PaymentController extends Controller
{
    public function __construct()
    {
        Stripe::setApiKey(config('services.stripe.secret'));
    }

    public function process(Request $request)
    {
        try {
            // Get billing data from session
            $billingData = Session::get('billing_data');
            if (!$billingData) {
                return response()->json(['error' => 'Billing information not found. Please start over.'], 400);
            }

            // Get cart items
            $cartItems = CartItem::with(['product', 'customJuice'])
                ->where('user_id', Auth::id())
                ->get();

            if ($cartItems->isEmpty()) {
                return response()->json(['error' => 'Your cart is empty.'], 400);
            }

            // Calculate totals
            $subtotal = $cartItems->sum('total_price');
            $tax = $subtotal * 0.08;
            $deliveryFee = $subtotal >= 50 ? 0 : 5.99;
            $total = $subtotal + $tax + $deliveryFee;

            // Create payment intent
            $paymentIntent = PaymentIntent::create([
                'amount' => round($total * 100), // Amount in cents
                'currency' => 'usd',
                'payment_method' => $request->payment_method_id,
                'confirm' => true,
                'automatic_payment_methods' => [
                    'enabled' => true,
                    'allow_redirects' => 'never'
                ],
                'metadata' => [
                    'user_id' => Auth::id(),
                    'order_type' => 'juice_order'
                ]
            ]);

            // Check payment status
            if ($paymentIntent->status === 'succeeded') {
                // Payment successful, create order
                DB::beginTransaction();

                try {
                    // Create order
                    $order = Order::create([
                        'user_id' => Auth::id(),
                        'order_number' => 'JB-' . strtoupper(uniqid()),
                        'billing_name' => $billingData['name'],
                        'billing_email' => $billingData['email'],
                        'billing_phone' => $billingData['phone'],
                        'billing_address' => $billingData['address'],
                        'billing_city' => $billingData['city'],
                        'billing_state' => '',
                        'billing_zip' => $billingData['zip'],
                        'delivery_type' => 'delivery',
                        'delivery_address' => $billingData['address'],
                        'delivery_city' => $billingData['city'],
                        'delivery_state' => '',
                        'delivery_zip' => $billingData['zip'],
                        'payment_method' => 'stripe',
                        'payment_intent_id' => $paymentIntent->id,
                        'subtotal' => $subtotal,
                        'tax' => $tax,
                        'delivery_fee' => $deliveryFee,
                        'total' => $total,
                        'status' => 'confirmed',
                        'special_instructions' => '',
                    ]);

                    // Create order items
                    foreach ($cartItems as $item) {
                        // Calculate individual item price
                        if ($item->custom_juice_id) {
                            $itemPrice = $item->customJuice->total_price;
                        } else {
                            $itemPrice = $item->product->price;
                        }
                        
                        OrderItem::create([
                            'order_id' => $order->id,
                            'product_id' => $item->product_id,
                            'custom_juice_id' => $item->custom_juice_id,
                            'quantity' => $item->quantity,
                            'price' => $itemPrice,
                            'total_price' => $itemPrice * $item->quantity,
                        ]);
                    }

                    // Award points to user (1 point per $1 spent)
                    $pointsEarned = floor($total);
                    Auth::user()->addPoints($pointsEarned);

                    // Clear cart and session
                    CartItem::where('user_id', Auth::id())->delete();
                    Session::forget('billing_data');

                    DB::commit();

                    return response()->json([
                        'success' => true,
                        'redirect_url' => route('checkout.success', $order->id)
                    ]);

                } catch (\Exception $e) {
                    DB::rollBack();
                    return response()->json(['error' => 'Failed to create order: ' . $e->getMessage()], 500);
                }

            } else {
                return response()->json(['error' => 'Payment was not successful. Status: ' . $paymentIntent->status], 400);
            }

        } catch (\Exception $e) {
            return response()->json(['error' => 'Payment failed: ' . $e->getMessage()], 500);
        }
    }
}