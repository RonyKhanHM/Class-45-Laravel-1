<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function create ()
    {
        $categories = Category::get();
        $subCategories = Subcategory::get();
        return view('backend.product.create', compact('categories', 'subCategories'));
    }

    public function store (Request $request)
    {
        $product = new Product();

        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->cat_id = $request->cat_id;
        $product->sub_cat_id = $request->sub_cat_id;
        $product->regular_price = $request->regular_price;
        $product->discount_price = $request->discount_price;
        $product->buying_price = $request->buying_price;
        $product->qty = $request->qty;
        $product->slu_code = $request->slu_code;
        $product->product_type = $request->product_type;
        $product->description = $request->description;
        $product->product_policy = $request->product_policy;
        
        if (isset($request->image)){
            $imageName = rand().'-product-'.'.'.$request->image->extension();
            $request->image->MOVE('backend/images/product/', $imageName);

            $product->image = $imageName;
        }

        $product->save();
        return redirect()->back();
        
    }

    public function show ()
    {
        $products = Product::get();

        return view('backend.product.show', compact('products'));
    }
}
