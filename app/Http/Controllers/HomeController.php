<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $featuredProducts = Product::where('is_active', true)
            ->where('is_featured', true)
            ->with(['category', 'manufacturer'])
            ->limit(8)
            ->get();

        $categories = Category::where('is_active', true)
            ->whereNull('parent_id')
            ->orderBy('sort_order')
            ->get();

        $newProducts = Product::where('is_active', true)
            ->with(['category', 'manufacturer'])
            ->orderBy('created_at', 'desc')
            ->limit(6)
            ->get();

        return view('home', compact('featuredProducts', 'categories', 'newProducts'));
    }
}
