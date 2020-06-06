<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\CategoryContract;

class CategoryController extends Controller
{
    protected $categoryRepository;

    public function __construct(CategoryContract $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function show($slug)
    {
        $category = $this->categoryRepository->findBySlug($slug);

        if ($category) {
            $products = $category->products();
        }

        if (!empty($products)){
            $products = $products->paginate(6);
        return view('site.pages.category')->with(['category' => $category,'products' => $products]);
        } else {
            return view('site.pages.category')->with(['category' => $category]);
        }
    }

    public function related($slug)
    {
        $category = $this->categoryRepository->findBySlug($slug);
    
        return view('site.pages.product', compact('category'));
    }
}