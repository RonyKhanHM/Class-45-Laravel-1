<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Color;
use App\Models\GalleryImage;
use App\Models\Product;
use App\Models\Review;
use App\Models\Size;
use App\Models\Subcategory;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    public function create ()
    {
        $categories = Category::get();
        $subCategories = Subcategory::get();
        $vendors = Vendor::get();
        return view('backend.product.create', compact('categories', 'subCategories', 'vendors'));
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
        $product->sku_code = $request->sku_code;
        $product->vendor_id = $request->vendor_id;
        $product->product_type = $request->product_type;
        $product->description = $request->description;
        $product->product_policy = $request->product_policy;
        
        if (isset($request->image)){
            $imageName = rand().'-product-'.'.'.$request->image->extension();
            $request->image->MOVE('backend/images/product/', $imageName);

            $product->image = $imageName;
        }

        $product->save();

        //Add color.............
        if (isset($request->color)&& $request->color[0] !=null){
            foreach($request->color as $colorName){
                $color = new Color();
                $color->product_id = $product->id;
                $color->color_name = $colorName;
                $color->save();
            }
        }

                //Add size.............
                if (isset($request->size)&& $request->size[0] !=null){
                    foreach($request->size as $sizeName){
                        $size = new Size();
                        $size->product_id = $product->id;
                        $size->size_name = $sizeName;
                        $size->save();
                    }
                }

                //Add Gallery Image................
                if(isset($request->galleryImage)){
                    foreach($request->galleryImage as $image){
                        $galleryImage = new GalleryImage();
                        $galleryImage->product_id = $product->id;

                        $imageName = rand().'-gallery-'.'.'.$image->extension();
                        $image->MOVE('backend/images/galleryImage/', $imageName);

                        $galleryImage->image = $imageName;
                        $galleryImage->save();
                    }
                }

 
                toastr()->success('Successfully Added Product!');
        return redirect('/admin/show-product');
        
    }

    public function show ()
    {
        $products = Product::with('category','subCategory', 'vendor')->get();
        return view('backend.product.show', compact('products'));
    }

    public function delete ($id)
    {
        $product = Product::find($id);

        if($product->image && file_exists('backend/images/product/'.$product->image)){
            unlink('backend/images/product/'.$product->image);
        }

        //Color delete
        $colors = Color::where('product_id', $id)->get();
        foreach($colors as $color){
            $color->delete();
        }

        //Size delete
        $sizes = Size::where('product_id', $id)->get();
        foreach($sizes as $size){
            $size->delete();
        }

        //galleryImage delete
        $galleryImages = GalleryImage::where('product_id', $id)->get();
        foreach($galleryImages as $image){

            if($image->image && file_exists('backend/images/galleryImage/'.$image->image)){
                unlink('backend/images/galleryImage/'.$image->image);
            }

            $image->delete();
        }
        $product->delete();
        toastr()->success('Product Delete Successfully!');
        return redirect()->back();
    }

    public function edit($id)
    {
        $product = Product::with('color', 'size', 'galleryImage')->where('id', $id)->first();
        $categories = Category::get();
        $subCategories = Subcategory::get();
        $vendors = Vendor::get();
        return view('backend.product.edit', compact('product', 'categories','subCategories', 'vendors'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::find($id);

        $product->name = $request->name;
        $product->slug = Str::slug($request->name);
        $product->cat_id = $request->cat_id;
        $product->sub_cat_id = $request->sub_cat_id;
        $product->regular_price = $request->regular_price;
        $product->discount_price = $request->discount_price;
        $product->buying_price = $request->buying_price;
        $product->qty = $request->qty;
        $product->sku_code = $request->sku_code;
        $product->vendor_id = $request->vendor_id;
        $product->product_type = $request->product_type;
        $product->description = $request->description;
        $product->product_policy = $request->product_policy;

        if(isset($request->image))
        {
            if($product->image && file_exists('backend/images/product/'.$product->image)){
                unlink('backend/images/product/'.$product->image);
            }

            $imageName = rand().'-productupdate-'.'.'.$request->image->extension();
            $request->image->move('backend/images/product/', $imageName);
            $product->image = $imageName;
        }

        $product->save();

        //Update color.............
        if (isset($request->color)){
            $colors = Color::where('product_id', $product->id)->get();
            foreach($colors as $colorName)
            {
                $colorName->delete();
            }

            foreach($request->color as $colorName){
                $color = new Color();
                $color->product_id = $product->id;
                $color->color_name = $colorName;
                $color->save();
            }
        }

         //Update size.............
         if (isset($request->size)){
            $sizes = Size::where('product_id', $product->id)->get();
            foreach($sizes as $sizeName)
            {
                $sizeName->delete();
            }

            foreach($request->size as $sizeName){
                $size = new Size();
                $size->product_id = $product->id;
                $size->size_name = $sizeName;
                $size->save();
            }
        }

        //Update Gallery Image................
        if(isset($request->galleryImage)){
            $images = GalleryImage::where('product_id', $product->id)->get();
            foreach($images as $galleryImage)
            {
                if($galleryImage->image && file_exists('backend/images/galleryImage/'.$galleryImage->image)){
                    unlink('backend/images/galleryImage/'.$galleryImage->image);
                }

                $galleryImage->delete();
            }

            foreach($request->galleryImage as $image){
                $galleryImage = new GalleryImage();
                $galleryImage->product_id = $product->id;

                $imageName = rand().'-gallery-'.'.'.$image->extension();
                $image->MOVE('backend/images/galleryImage/', $imageName);

                $galleryImage->image = $imageName;
                $galleryImage->save();
            }
        }
        return redirect()->back();
    }



    //Product Reviews.........................................
    public function createReview()
    {
        $products = Product::orderBy('name', 'asc')->get();
        return view('backend.review.create', compact('products'));
    }
    public function storeReview (Request $request)
    {
        $review = new Review();

        //Customer image...............
        if (isset($request->image)){
            $imageName = rand().'-review-'.'.'.$request->image->extension();
            $request->image->MOVE('backend/images/review/', $imageName);

            $review->image = $imageName;
        }

        //Customer Review image...............
        // if(isset($request->review_image)){
        //     foreach($request->review_image as $image){
        //         $reviewImage = new GalleryImage();
        //         $reviewImage->product_id = $request->id;

        //         $imageName = rand().'-reviewImage-'.'.'.$image->extension();
        //         $image->MOVE('backend/images/review_image/', $imageName);

        //         $reviewImage->image = $imageName;
        //         $reviewImage->save();
        //     }
        // }
        $review->product_id = $request->product_id;
        $review->name = $request->name;
        $review->status = $request->status;
        $review->rating = $request->rating;
        $review->comments = $request->comments;

        $review->save();
        toastr()->success('Review add Successfully!');
        return redirect()->back();
    }
    public function showReview ()
    {
        $reviews = Review::with('product')->get();
        return view('backend.review.list', compact('reviews'));
    }
    public function editReview ($id)
    {
        $review = Review::find($id);
        $products = Product::get();

        return view('backend.review.edit', compact('review', 'products'));
    }
    public function deleteReview($id)
    {
        $review = Review::find($id);

        if($review->image && file_exists('backend/images/review/'.$review->image)){
            unlink('backend/images/review/'.$review->image);
        }

        $review->delete();
        toastr()->success('Review Delete Successfully!');
        return redirect()->back();
    }
}
