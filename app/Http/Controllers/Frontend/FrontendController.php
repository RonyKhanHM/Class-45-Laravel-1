<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index ()
    {
        $hotproducts = Product::where('product_type', 'hot')->get();
        $regularproducts = Product::where('product_type', 'regular')->get();
        $newproducts = Product::where('product_type', 'new')->get();
        $discountproducts = Product::where('product_type', 'discount')->get();
        return view ('frontend.index', compact('hotproducts', 'regularproducts', 'newproducts', 'discountproducts'));
    }
    public function productDetails ($slug)
    {
        $product = Product::where('slug', $slug)->with('color', 'size', 'galleryImage')->first();
        return view ('frontend.product-details', compact('product'));
    }
    public function viewCart ()
    {
        return view('frontend.view-cart');
    }
    public function checkout ()
    {
        return view ('frontend.checkout');
    }
    public function addToCart (Request $request, $id)
    {
        $cartProduct = Cart::where('product_id', $id)->where('ip_address', $request->ip())->first();
        $product = Product::find($id);

        if($cartProduct == null)
        {
            $cart = new Cart();

        $cart->ip_address = $request->ip();
        $cart->product_id = $product->id;
        $cart->qty = 1;
        if($product->discount_price != null)
        {
            $cart->price = $product->discount_price;
        }
        if($product->discount_price == null){
            $cart->price = $product->reqular_price;
        }

        $cart->save();
        toastr()->success('Successfully Added to Cart!');
        return redirect()->back();
        }

        if($cartProduct != null)
        {
            $cartProduct->qty = $cartProduct->qty+1;
            $cartProduct->save();
            toastr()->success('Successfully Added to Cart!');
            return redirect()->back();
        }
    }
}
