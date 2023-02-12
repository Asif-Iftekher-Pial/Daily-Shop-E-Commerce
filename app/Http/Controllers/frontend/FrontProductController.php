<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class FrontProductController extends Controller
{

    public function viewProductDetail($slug)
    {

        $product = Product::where(['slug' => $slug], ['status' => 'active'])->with('productAttribute', 'imageAttribute')->first();
        $randProd = Product::where(['status' => 'active'])->with('productAttribute', 'imageAttribute')->inRandomOrder()->take(20)->get();

        return view('frontend.partials.products.products_detail', compact('product', 'randProd'));

    }
    

    public function viewProducts(Request $request)
    {
        $products = Product::query();

        if (!empty($_GET['category'])) {
            $slug = explode(',', $_GET['category']);
            $cat_id = Category::select('id')->whereIn('cat_name_slug', $slug)->pluck('id')->toArray();
            $products = $products->whereIn('category_id', $cat_id)->where(['status' => 'active'])->paginate(10);
            // dd($products);
        }
        if (!empty($_GET['sortBy'])) {
            if ($_GET['sortBy'] == 'Name') {
                $products = $products->sortBy('title');
            }
            if ($_GET['sortBy'] == 'Price') {
                $products = $products->sortBy('offer_price');
            }
            if ($_GET['sortBy'] == 'PriceDesc') {
                $products = $products->sortByDesc('offer_price');
            }
            if ($_GET['sortBy'] == 'Date') {
                $products = $products->sortByDesc('created_at');
            }

        } else {

            $products = $products->with('productAttribute')->paginate(15);
        }

        $category = Category::orderBy('cat_name', 'ASC')->take(8)->get();

        return view('frontend.partials.products.products', compact('products', 'category'));
    }
    public function productFilter(Request $request)
    {

        $data = $request->all();
        //  dd($data);
        $catUrl = ''; //lets take a variable catUrl
        if (!empty($data['category'])) { //check if requested data['category'] from view  is not empty  then-
            foreach ($data['category'] as $category) { //take all the collection of category as single category
                if (empty($catUrl)) { //if  when catUrl is empty then
                    $catUrl .= '&category=' . $category; //single category wil store is  catUrl
                } else {
                    $catUrl .= ',' . $category;
                }
            }
        }

        //  sort

        $sortUrl = '';
        if (!empty($data['sortBy'])) {
            $sortUrl .= '&sortBy=' . $data['sortBy'];
        }
        return \redirect()->route('viewProducts', $catUrl . $sortUrl);
    }

}
