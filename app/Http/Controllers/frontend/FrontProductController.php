<?php

namespace App\Http\Controllers\frontend;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class FrontProductController extends Controller
{

    public function viewProductDetail($slug){
       
        $product = Product::where(['slug'=>$slug],['status'=>'active'])->with('productAttribute','imageAttribute')->first();
        $randProd = Product::where(['status'=>'active'])->with('productAttribute','imageAttribute')->inRandomOrder()->take(20)->get();
            
        return view('frontend.partials.products.products_detail',compact('product','randProd'));

    }
    public function categorizedProduct($slug){
        $category = Category::orderBy('cat_name','ASC')->take(5)->get();
        $products =  Category::where('cat_name_slug',$slug)->with('getProducts')->get();
       
        
        return view('frontend.partials.products.products',compact('products','category'));
    }

    public function viewProducts(){

        return view('frontend.partials.products.products');
    }
}
