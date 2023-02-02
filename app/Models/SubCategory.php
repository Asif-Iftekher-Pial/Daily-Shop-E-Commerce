<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $fillable = [
     'category_id','sub_cat_name','sub_cat_name_slug',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
