<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Models\Category;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void {}

    public function boot(): void
    {
        Paginator::useBootstrapFive();

        View::composer('*', function ($view) {
            $view->with('brand', config('brand'));
            $view->with('cartCount', collect(session('cart', []))->sum('quantity'));
            $view->with('navCategories', Category::orderBy('name')->get());
        });
    }
}
