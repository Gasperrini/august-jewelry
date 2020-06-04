<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;

class DashboardController extends Controller
{
    public function index()
    {
        $order_count = Order::all();
        $product_count = Product::all();
        $category_count = Category::where('name', '!=', 'Root');
        $attribute_count = Attribute::all();
        return view('admin.dashboard.index', compact('order_count', 'product_count', 'category_count', 'attribute_count'));
    }
}
