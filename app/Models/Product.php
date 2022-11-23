<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    private static $product, $image, $imageName,$imageExtension, $directory, $imgUrl;

    private static function getImageUrl($request)
    {
        self::$image = $request->file('image');
        self::$imageExtension = self::$image->getClientOriginalExtension();
        self::$imageName = time().'.'.self::$imageExtension;
        self::$directory = 'product-images/';
        self::$image->move(self::$directory, self::$imageName);
        return self::$directory.self::$imageName;
    }

    public static function addProduct($request)
    {
        self::$product = new Product();
        self::$product->category_id = $request->category_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->title = $request->title;
        self::$product->description = $request->description;
        self::$product->code = $request->code;
        self::$product->image = self::getImageUrl($request);
        self::$product->save();
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public static function updateProduct($request, $id)
    {
        self::$product = Product::find($id);
        if($request->file('image'))
        {
            if(file_exists(self::$product->image))
            {
                unlink(self::$product->image);
            }
            self::$imgUrl = self::getImageUrl($request);
        }
        else
        {
            self::$imgUrl = self::$product->image;
        }
        self::$product->category_id = $request->category_id;
        self::$product->brand_id = $request->brand_id;
        self::$product->title = $request->title;
        self::$product->description = $request->description;
        self::$product->code = $request->code;
        self::$product->image = self::$imgUrl;
        self::$product->save();
    }

    public static function deleteProduct($id)
    {
        self::$product = Product::find($id);
        if(file_exists(self::$product->image))
        {
            unlink(self::$product->image);
        }
        self::$product->delete();
    }

}
