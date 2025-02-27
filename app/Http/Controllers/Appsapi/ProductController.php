<?php

namespace App\Http\Controllers\Appsapi;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts (){
        $hotproducts = Product::where('product_type', 'hot')->get();
        $regularproducts = Product::where('product_type', 'regular')->get();
        $newproducts = Product::where('product_type', 'new')->get();
        $discountproducts = Product::where('product_type', 'discount')->get();

        return response()->json([
            'hotproduct' => $hotproducts,
            'regproduct' => $regularproducts,
            'newproduct' => $newproducts,
            'discountproduct' => $discountproducts,
        ]);
    }
    
}
