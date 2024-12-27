<?php

namespace App\Models;

use App\Http\Controllers\Backend\SubCategoryController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function color ()
    {
        return $this->hasSetMutator(Color::class, 'product_id', 'id');
    }

    public function size ()
    {
        return $this->hasSetMutator(Size::class, 'product_id', 'id');
    }

    public function galleryImage ()
    {
        return $this->hasSetMutator(GalleryImage::class, 'product_id', 'id');
    }

    public function category ()
    {
        return $this->belongsTo(Category::class, 'cat_id', 'id');
    }

    public function subCategory ()
    {
        return $this->belongsTo(Subcategory::class, 'sub_cat_id', 'id');
    }
}
