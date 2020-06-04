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
            $view->with('categories', Category::orderByRaw('id ASC')->get()->nest());
        });

        View::composer('site.partials.header', function ($view) {
            $view->with('cartCount', Cart::getContent()->count());
        });

        View::composer('site.pages.homepage', function ($view) {
            $view->with('products', Product::orderByRaw('id DESC')->limit(6)->get());
        });

        View::composer('site.pages.product', function ($view) {
            $view->with('products', Product::inRandomOrder()->limit(3)->get());
        });
    }
}
