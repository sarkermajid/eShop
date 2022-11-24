<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;

class ProductController extends Controller
{

    private $categories,$brands,$products,$product;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->products = Product::all();
        return view('product.manage', ['products'=>$this->products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->categories = Category::all();
        $this->brands = Brand::all();
        return view('product.index', ['categories'=>$this->categories, 'brands'=>$this->brands]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Product::addProduct($request);
        return redirect('/product/create')->with('message', 'Product added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $this->product = Product::find($id);
        return view('product.view',['product'=>$this->product]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->product = Product::find($id);
        $this->categories = Category::all();
        $this->brands = Brand::all();
        return view('product.edit', ['product'=>$this->product, 'categories'=>$this->categories,'brands'=>$this->brands]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Product::updateProduct($request,$id);
        return redirect('/product')->with('message', 'Product update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Product::deleteProduct($id);
        return redirect('/product')->with('message_delete','Product delete successfully');
    }

    public function details($id)
    {
        $this->product = Product::find($id);
        return view('product.details',['product'=>$this->product]);
    }

    public function allProduct()
    {
        return view('product.allproducts',['products'=> Product::all()]);
    }
}
