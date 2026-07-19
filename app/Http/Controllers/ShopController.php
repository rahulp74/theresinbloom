<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ShopController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));
        $catSlug = $request->query('category');

        $query = Product::query()->with('category');
        if ($q !== '') {
            $query->where(function ($w) use ($q) {
                $w->where('name', 'like', "%{$q}%")
                  ->orWhere('description', 'like', "%{$q}%");
            });
        }
        if ($catSlug) {
            $query->whereHas('category', fn ($c) => $c->where('slug', $catSlug));
        }

        $products = $query->orderByDesc('best_seller')->orderBy('name')->get();
        $categories = Category::orderBy('name')->get();

        return view('pages.shop', compact('products', 'categories', 'q', 'catSlug'));
    }
}
