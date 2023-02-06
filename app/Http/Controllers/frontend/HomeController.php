<?php

namespace App\Http\Controllers\frontend;

use App\Models\Promo;
use App\Models\Banner;
use App\Models\Product;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function home()
    {
        $sliders = Banner::where('status','active')->orderBy('id','desc')->get();
        $promos  =Promo::where('status','active')->orderBy('id','desc')->get();
        $popular = Product::where(['status'=>'active','choice'=>'popular'])->take(8)->get();
        $feature = Product::where(['status'=>'active','choice'=>'feature'])->take(8)->get();
        $hot = Product::where(['status'=>'active','conditions'=>'hot'])->take(8)->get();
        $sale = Product::where(['status'=>'active','conditions'=>'sale'])->take(8)->get();
        $latest = Product::where(['status'=>'active'])->orderBy('id','desc')->take(8)->get();

        // slider product
        $Slider_popular = Product::where(['status'=>'active','choice'=>'popular'])->inRandomOrder()->limit(8)->get();
        // return $popular;
        $Slider_feature = Product::where(['status'=>'active','choice'=>'feature'])->inRandomOrder()->limit(8)->get();
        
        return view('frontend.partials.home.home',compact('latest','Slider_feature','Slider_popular','sliders','promos','popular','feature','hot','sale'));
    }

    public function quickView($slug){
        $quickView = Product::with('subCategory','productAttribute','imageAttribute')->where('slug', $slug)->firstOrFail();
        $data = [
            'product' => $quickView,
            'subCategory' => $quickView->subCategory,
            'productAttribute' => $quickView->productAttribute,
            'imageAttribute' => $quickView->imageAttribute
        ];
        return response()->json($data);
    }
}
