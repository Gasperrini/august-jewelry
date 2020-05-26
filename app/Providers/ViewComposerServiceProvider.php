<?php

namespace App\Providers;

use Cart;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('site.partials.nav', function ($view) {
            $view->with('categories', Category::orderByRaw('name ASC')->get()->nest());
        });

        View::composer('site.partials.header', function ($view) {
            $view->with('cartCount', Cart::getContent()->count());
        });

        View::composer('site.pages.homepage', function ($view) {
            $view->with('products', Product::orderByRaw('name ASC')->limit(6)->get());
        });
    }
}
