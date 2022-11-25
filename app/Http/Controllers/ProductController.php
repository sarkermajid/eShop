<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
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

    public function addToCart(Request $request)
    {
        $id = $request->has('id')? $request->get('id'):'';
        $title = $request->has('title')? $request->get('title'):'';
        $quantity = $request->has('quantity')? $request->get('quantity'):'';
        $price = $request->has('price')? $request->get('price'):'';

//        $cart = new Cart();
//        Cart::add($id, $title, $quantity, $price);
//        Cart::update($cart->rowId, ['qty'=>$quantity]);
//        return redirect()->back()->with('message','Product add to cart successfully');

        $cart = Cart::content()->where('id',$id)->first();
        if(isset($cart) && $cart!=null)
        {
            $quantity = (int)$quantity + (int)$cart->qty;
            $total = ((int)$quantity * (int)$price);
            Cart::update($cart->rowId, ['qty'=>$quantity, 'options' => ['total'=>$total]]);
            return redirect('/product/all')->with('message_cart', 'Product update add to cart');
        }
        else
        {
            $total = ((int)$quantity * (int)$price);
            Cart::add($id, $title, $quantity, $price, ['total'=>$total]);

            return redirect('/product/all')->with('message_cart','Product add to cart successfully');
        }
    }

    public function viewCart()
    {
        $carts = Cart::content();
        $subtotal = Cart::subtotal();
        return view('cart.index',['carts'=>$carts, 'subtotal'=>$subtotal]);
    }

    public function removeCart($rowId)
    {
        Cart::remove($rowId);
        return redirect()->back()->with('message_delete', 'Product remove successfully');

    }
}
