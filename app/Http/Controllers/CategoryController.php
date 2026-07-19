<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->orderBy('name')->get();
        return view('pages.categories', compact('categories'));
    }

    public function show(Category $category)
    {
        $products = $category->products()->orderByDesc('best_seller')->get();
        return view('pages.category-show', compact('category', 'products'));
    }
}
