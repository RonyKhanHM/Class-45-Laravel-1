<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function create (){
        return view ('backend.category.create');
    }

    public function store (Request $request){
        $category = new Category();

        $category->name = $request->name;
        $category->slug = str::slug($request->name);

        if(isset($request->image)){
            $imageName = rand().'-category-'.'.'.$request->image->extension();
            $request->image->move('backend/images/category/', $imageName);
            $category->image = $imageName;
        }
        $category->save();
        return redirect()->back();
    }

    public function show (){
        $categories = Category::get();
        return view ('backend.category.list', compact('categories'));
    }

    public function delete ($id)
    {
        $category = Category::find($id);

        if($category->image && file_exists('backend/images/category/'.$category->image)){
            unlink('backend/images/category/'.$category->image);
        }
        $category->delete();

        return redirect()->back();
    }

    public function edit ($id)
    {
        $category = Category::find($id);
        return view ('backend.category.edit', compact('category'));
    }

    public function update (Request $request, $id)
    {
        $category = Category::find($id);

        $category->name = $request->name;
        $category->slug = str::slug($request->name);

        if(isset($request->image))
        {
            if($category->image && file_exists('backend/images/category/'.$category->image)){
                unlink('backend/images/category/'.$category->image);
            }

            $imageName = rand().'-categoryupdate-'.'.'.$request->image->extension();
            $request->image->move('backend/images/category/', $imageName);
            $category->image = $imageName;
        }
        
        $category->save();
        return redirect('/admin/show-catetory');
    }    
}
