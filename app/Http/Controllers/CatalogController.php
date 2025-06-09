<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Manufacturer;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::where('is_active', true)->with(['category', 'manufacturer']);

        // Фильтрация по категории
        if ($request->has('category') && $request->category) {
            $category = Category::where('slug', $request->category)->first();
            if ($category) {
                $query->where('category_id', $category->id);
            }
        }

        // Фильтрация по производителю
        if ($request->has('manufacturer') && $request->manufacturer) {
            $manufacturer = Manufacturer::where('slug', $request->manufacturer)->first();
            if ($manufacturer) {
                $query->where('manufacturer_id', $manufacturer->id);
            }
        }

        // Фильтрация по цене
        if ($request->has('price_from') && $request->price_from) {
            $query->where('price', '>=', $request->price_from);
        }
        if ($request->has('price_to') && $request->price_to) {
            $query->where('price', '<=', $request->price_to);
        }

        // Поиск
        if ($request->has('search') && $request->search) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('name', 'like', "%{$search}%")
                  ->orWhere('description', 'like', "%{$search}%")
                  ->orWhere('sku', 'like', "%{$search}%");
            });
        }

        // Сортировка
        $sort = $request->get('sort', 'name');
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            default:
                $query->orderBy('name', 'asc');
        }

        $products = $query->paginate(12);

        $categories = Category::where('is_active', true)->whereNull('parent_id')->orderBy('sort_order')->get();
        $manufacturers = Manufacturer::where('is_active', true)->orderBy('name')->get();

        return view('catalog.index', compact('products', 'categories', 'manufacturers'));
    }

    public function show(Product $product)
    {
        $product->load(['category', 'manufacturer', 'images', 'attributes', 'reviews' => function($query) {
            $query->where('is_approved', true)->with('user');
        }]);

        $relatedProducts = Product::where('is_active', true)
            ->where('category_id', $product->category_id)
            ->where('id', '!=', $product->id)
            ->limit(4)
            ->get();

        return view('catalog.show', compact('product', 'relatedProducts'));
    }
}
