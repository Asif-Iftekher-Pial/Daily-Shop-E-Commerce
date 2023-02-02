<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable  =[
        'category_id',
        'sub_category_id',
        'title',
        'slug',
        'price',
        'offer_price',
        'total_stock',
        'summary',
        'description',
        'image',
        'status',
        'conditions',
        'choice'
    ];

        public function imageAttribute()
        {
            return $this->hasMany(MultipleImages::class);
        }
}
