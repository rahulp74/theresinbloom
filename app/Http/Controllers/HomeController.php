<?php

namespace App\Http\Controllers;

use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
        $bestSellers = Product::where('best_seller', true)->take(4)->get();
        return view('pages.home', compact('bestSellers'));
    }
}
