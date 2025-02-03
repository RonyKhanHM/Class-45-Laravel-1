<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\order;
use App\Models\OrderDetails;
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
            if($product->discount_price == null)
                {
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

    public function addToCartDelete ($id)
    {
        $cart = Cart::find($id);
        $cart->delete();
        toastr()->success('Successfully Deleted from Cart!');
            return redirect()->back();
    }

    public function addToCartDetails(Request $request, $id)
    {
        $cartProduct = Cart::where('product_id', $id)->where('ip_address', $request->ip())->first();
        $product = Product::find($id);

        if($cartProduct == null)
        {
            $cart = new Cart();

            $cart->ip_address = $request->ip();
            $cart->product_id = $product->id;
            $cart->qty = $request->qty;
            $cart->color = $request->color;
            $cart->size = $request->size;
            if($product->discount_price != null)
                {
                 $cart->price = $product->discount_price;
                }
            if($product->discount_price == null)
                {
                 $cart->price = $product->reqular_price;
                }

            $cart->save();
            if($request->action == "addToCart"){
                toastr()->success('Successfully Added to Cart!');
                return redirect()->back();
            }
            else if($request->action == "buyNow"){
                toastr()->success('Successfully Added to Cart!');
                return redirect('/checkout');
            }
        }

        if($cartProduct != null)
        {
            $cartProduct->qty = $cartProduct->qty+$request->qty;
            $cartProduct->save();

            if($request->action == "addToCart"){
                toastr()->success('Successfully Added to Cart!');
                return redirect()->back();
            }
            else if($request->action == "buyNow"){
                toastr()->success('Successfully Added to Cart!');
                return redirect('/checkout');
            }
        }
    }

    public function confirmOrder(Request $request)
    {
       $order = new Order();

       $previousOrder = Order::orderBy('id', 'desc')->first();
       if($previousOrder == null)
       {
        $generatedInvoiceID = "XYZ-1";
        $order->invoiceId = $generatedInvoiceID;
       }
       else
       {
        $generatedInvoiceID = "XYZ-".$previousOrder->id+1;
        $order->invoiceId = $generatedInvoiceID;
       }
       $order->c_name = $request->c_name;
       $order->c_phone = $request->c_phone;
       $order->address = $request->address;
       $order->area = $request->area;
       $order->price = $request->inputGrandTotal;

       $cartProducts = Cart::where('ip_address', $request->ip())->get();
       if($cartProducts->isNotEmpty()){
        $order->save();
        foreach($cartProducts as $cart){
            $orderDetails = new OrderDetails();

            $orderDetails->order_id = $order->id;
            $orderDetails->product_id = $cart->product_id;
            $orderDetails->size = $cart->size;
            $orderDetails->color = $cart->color;
            $orderDetails->qty = $cart->qty;
            $orderDetails->price = $cart->price;

            $orderDetails->save();
            $cart->delete();
        }
       }
       else{
        toastr()->warning('You Cart is Empty!!');
        return redirect('/');
       }
       toastr()->success('Order has been placed Successfully!');
        return redirect('order-confirm/'.$generatedInvoiceID);
    }

    public function thankYouPage ($invoiceId){
        return view('frontend.thankyou', compact('invoiceId'));
    }

    //Category Products........................
    public function categoryProducts($slug, $id)
    {
        $products = Product::where('cat_id', $id)->get();
        $productsCount = $products->count();

        return view('frontend.category-products', compact('products', 'productsCount'));
    }

    //shop products...................
    public function shopProducts (Request $request){
        if(isset($request->categoryId)){
            $products = Product::orderBy('id', 'desc')->where('cat_id', $request->categoryId)->get();
        }
        elseif(isset($request->subCategoryId)){
            $products = Product::orderBy('id', 'desc')->where('sub_cat_id', $request->subCategoryId)->get();
        }
        else{
            $products = Product::orderBy('id', 'desc')->get();
        }
        $productsCount = $products->count();

        return view('frontend.shop', compact('products', 'productsCount'));
    }
    //Offer products...................
    public function offerProducts (Request $request){
        if(isset($request->categoryId)){
            $products = Product::orderBy('id', 'desc')->where('cat_id', $request->categoryId)->get();
        }
        elseif(isset($request->subCategoryId)){
            $products = Product::orderBy('id', 'desc')->where('sub_cat_id', $request->subCategoryId)->get();
        }
        else{
            $products = Product::orderBy('id', 'desc')->get();
        }
        $productsCount = $products->count();

        return view('frontend.offer', compact('products', 'productsCount'));
    }
    //Combo products...................
    public function comboProducts (Request $request){
        if(isset($request->categoryId)){
            $products = Product::orderBy('id', 'desc')->where('cat_id', $request->categoryId)->get();
        }
        elseif(isset($request->subCategoryId)){
            $products = Product::orderBy('id', 'desc')->where('sub_cat_id', $request->subCategoryId)->get();
        }
        else{
            $products = Product::orderBy('id', 'desc')->get();
        }
        $productsCount = $products->count();

        return view('frontend.combo', compact('products', 'productsCount'));
    }
    //Standard products...................
    public function standardProducts (Request $request){
        if(isset($request->categoryId)){
            $products = Product::orderBy('id', 'desc')->where('cat_id', $request->categoryId)->get();
        }
        elseif(isset($request->subCategoryId)){
            $products = Product::orderBy('id', 'desc')->where('sub_cat_id', $request->subCategoryId)->get();
        }
        else{
            $products = Product::orderBy('id', 'desc')->get();
        }
        $productsCount = $products->count();

        return view('frontend.standard', compact('products', 'productsCount'));
    }
    //Premium products...................
    public function premiumProducts (Request $request){
        if(isset($request->categoryId)){
            $products = Product::orderBy('id', 'desc')->where('cat_id', $request->categoryId)->get();
        }
        elseif(isset($request->subCategoryId)){
            $products = Product::orderBy('id', 'desc')->where('sub_cat_id', $request->subCategoryId)->get();
        }
        else{
            $products = Product::orderBy('id', 'desc')->get();
        }
        $productsCount = $products->count();

        return view('frontend.premium', compact('products', 'productsCount'));
    }

    //Policies Pages..............................
    public function privacyPolicy(){
        return view('frontend.privacy-policy');
    }
    public function termsConditions(){
        return view('frontend.terms-conditions');
    }
    public function refundPolicy(){
        return view('frontend.refund-policy');
    }
    public function peymentPolicy(){
        return view('frontend.payment-policy');
    }
}
