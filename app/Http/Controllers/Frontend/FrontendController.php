<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
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
    public function productDetails ($id)
    {
        $product = Product::where('id', $id)->with('color', 'size', 'galleryImage')->first();
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
}
