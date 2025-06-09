<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $totalProducts = Product::count();
        $totalOrders = Order::count();
        $totalUsers = User::where('role', 'user')->count();
        $totalSales = Order::where('status', '!=', 'cancelled')->sum('total_amount');
        
        $recentOrders = Order::with('user')
            ->orderBy('created_at', 'desc')
            ->limit(5)
            ->get();
            
        $lowStockProducts = Product::where('quantity', '<', 10)
            ->where('is_active', true)
            ->orderBy('quantity')
            ->limit(5)
            ->get();
            
        return view('admin.dashboard', compact(
            'totalProducts', 
            'totalOrders', 
            'totalUsers', 
            'totalSales', 
            'recentOrders', 
            'lowStockProducts'
        ));
    }
}
