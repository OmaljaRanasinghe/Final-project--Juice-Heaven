<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['user', 'orderItems.product'])
            ->latest()
            ->paginate(15);
            
        $pendingOrders = Order::where('status', 'pending')->count();
        $preparingOrders = Order::where('status', 'preparing')->count();
        $readyOrders = Order::where('status', 'ready')->count();
        
        return view('employee.orders.index', compact(
            'orders', 
            'pendingOrders', 
            'preparingOrders', 
            'readyOrders'
        ));
    }

    public function show(Order $order)
    {
        $order->load(['user', 'orderItems.product', 'orderItems.customJuice']);
        return view('employee.orders.show', compact('order'));
    }

    public function updateStatus(Request $request, Order $order)
    {
        $request->validate([
            'status' => 'required|in:pending,preparing,ready,completed'
        ]);

        $order->update([
            'status' => $request->status,
            'updated_by_employee' => auth()->user()->name,
            'status_updated_at' => now()
        ]);

        return redirect()->back()->with('success', 'Order status updated successfully!');
    }
}
