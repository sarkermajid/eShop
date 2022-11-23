<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\ProductController;

class HomeController extends Controller
{
    private $products,$brands,$categories;
    public function index()
    {
        $this->products = Product::all();
        $this->categories = Category::all();
        $this->brands = Brand::all();
        return view('home.index',['products'=>$this->products, 'categories'=>$this->categories, 'brands'=>$this->brands]);
    }
}
