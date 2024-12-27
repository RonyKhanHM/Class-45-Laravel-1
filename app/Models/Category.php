<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    use HasFactory;
    
    protected $guarded = [];

    public function subCategory ()
    {
        return $this->hasMany(Subcategory::class,'cat_id', 'id');
    }

    public function product ()
    {
        return $this->hasMany(Product::class,'cat_id', 'id');
    }
}
