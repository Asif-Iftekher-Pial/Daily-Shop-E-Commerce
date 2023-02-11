<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['cat_name','cat_name_slug'];

    public function subCats(){
        return $this->hasMany(SubCategory::class);
    }

    public function getProducts()
    {
        return $this->hasManyThrough(Product::class, SubCategory::class,'category_id','sub_category_id','id','id');
    }
}


