<?php

namespace App\Http\Controllers\Appsapi;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function getCategories ()
    {
        $categories = Category::get();
        $subCategories = Subcategory::get();

        return response()->json([
            'category' => $categories,
            'subCategory' => $subCategories,
        ]);
    }
}
