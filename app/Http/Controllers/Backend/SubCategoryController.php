<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class SubCategoryController extends Controller
{
    public function create ()
    {
        $categories = Category::get();
        return view('backend.subcategory.create', compact('categories'));
    }

    public function store (Request $request)
    {
        $subcategory = new Subcategory();

        $subcategory->cat_id = $request->cat_id;
        $subcategory->name = $request->name;
        $subcategory->slug = Str::slug($request->name);

        $subcategory->save();
        return redirect()->back();
    }

    public function show ()
    {
        $subcategories = Subcategory::get();
        return view('backend.subcategory.list', compact('subcategories'));
    }

    public function delete ($id)
    {
        $subcategory = Subcategory::find($id);
        $subcategory->delete();
        return redirect()->back();
    }
}
