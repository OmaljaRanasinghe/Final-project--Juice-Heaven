<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class EmployeeController extends Controller
{
    public function dashboard()
    {
        $todaysOrders = Order::whereDate('created_at', today())->count();
        $pendingOrders = Order::where('status', 'pending')->count();
        $preparingOrders = Order::where('status', 'preparing')->count();
        $readyOrders = Order::where('status', 'ready')->count();
        
        return view('employee.dashboard', compact(
            'todaysOrders',
            'pendingOrders',
            'preparingOrders',
            'readyOrders'
        ));
    }

    public function profile()
    {
        $employee = auth()->user();
        
        // Get employee work statistics
        $totalOrdersHandled = Order::where('updated_by_employee', $employee->name)->count();
        $todaysOrdersHandled = Order::where('updated_by_employee', $employee->name)
            ->whereDate('status_updated_at', today())->count();
        $recentActivity = Order::where('updated_by_employee', $employee->name)
            ->with(['user', 'orderItems'])
            ->latest('status_updated_at')
            ->take(10)
            ->get();
        
        return view('employee.profile', compact(
            'employee',
            'totalOrdersHandled',
            'todaysOrdersHandled',
            'recentActivity'
        ));
    }
}
