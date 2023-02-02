<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Category;
use App\Models\Attribute;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->paginate(20);
        $category = Category::get();
        return view('admin.partials.products.index', compact('products', 'category'));
    }

    public function getChildCategory($id)
    {
        $child_cat = SubCategory::where('category_id', $id)->get();
        return response()->json($child_cat);
    }
    public function getChildCategoryEdit($id)
        {
            $child_cat = SubCategory::where('category_id', $id)->get();
            return response()->json($child_cat);
        }

    public function status(Request $request)
    {

        if ($request->mode == 'true') {
            DB::table('products')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('products')->where('id', $request->id)->update(['status' => 'deactive']);
        }
        return response()->json([
            'message' => 'Status Changed Successfully',
            'status' => 200,
        ]);
    }
    public function choice_status(Request $request)
    {

        if ($request->mode == 'true') {
            DB::table('products')->where('id', $request->id)->update(['choice' => 'popular']);
        } else {
            DB::table('products')->where('id', $request->id)->update(['choice' => 'feature']);
        }
        return response()->json([
            'message' => 'Choice Changed Successfully',
            'status' => 200,
        ]);
    }
    public function condition_status(Request $request)
    {

        if ($request->mode == 'true') {
            DB::table('products')->where('id', $request->id)->update(['conditions' => 'sale']);
        } else {
            DB::table('products')->where('id', $request->id)->update(['conditions' => 'hot']);
        }
        return response()->json([
            'message' => 'Product Condition Changed',
            'status' => 200,
        ]);
    }

    public function attributes($slug){
       
        $data = Product::with('imageAttribute')->FindorFail($slug);
        $attributes = Attribute::where('product_id',$slug)->get();
        // return $attributes;
        return view('admin.partials.products.attribute',compact('data','attributes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'title' => 'required|string|unique:products,title',
            'slug' => 'unique:products,slug',
            'price' => 'required',
            'offer_price' => 'required',
            'total_stock' => 'required',
            'summary' => 'required',
            'choice' => 'required',
            'conditions' => 'required',
            'status' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        } else {
            if ($request->file('image')) {
                try {
                    $file = $request->file('image');
                    $filename = date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                    Image::make($file)->resize(250, 300)->save(public_path('admin/images/products/') . $filename);
                } catch (\Exception $e) {
                    return $e->getMessage();
                }
            }
            

            $data = new Product();
            $data->category_id = $request->category_id;
            $data->sub_category_id = $request->sub_category_id;
            $data->title = $request->title;
            $data->slug = Str::slug($request->title);
            $data->price = $request->price;
            $data->offer_price = $request->offer_price;
            $data->total_stock = $request->total_stock;
            $data->summary = $request->summary;
            $data->status = $request->status;
            $data->description = $request->description;
            $data->conditions = $request->conditions;
            $data->choice = $request->choice;
            $data->image = $filename;
            $status = $data->save();
            if ($status) {
                return response()->json(['message' => 'Product Added Successfully', 'status' => 200]);
            } else {
                return response()->json(['message' => 'Something went wrong']);
            }

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::FindorFail($id);
        return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'category_id' => 'required',
            'sub_category_id' => 'required',
            'title' => 'string',
            'price' => 'required',
            'offer_price' => 'required',
            'total_stock' => 'required',
            'summary' => 'required',
            'choice' => 'required',
            'conditions' => 'required',
            'status' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()->all()]);
        } else {
            $data = Product::FindorFail($id);
            if ($request->file('image')) {
                try {
                    $file = $request->file('image');
                    $filename = date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                    Image::make($file)->resize(250, 300)->save(public_path('admin/images/products/') . $filename);
                    @unlink(public_path('admin/images/products/'.$data->image));
                } catch (\Exception $e) {
                    return $e->getMessage();
                }
            }
            $data->category_id = $request->category_id;
            $data->sub_category_id = $request->sub_category_id;
            $data->title = $request->title;
            $data->slug = Str::slug($request->title);
            $data->price = $request->price;
            $data->offer_price = $request->offer_price;
            $data->total_stock = $request->total_stock;
            $data->summary = $request->summary;
            $data->status = $request->status;
            $data->description = $request->description;
            $data->conditions = $request->conditions;
            $data->choice = $request->choice;
            $data->image = $filename;
            $status = $data->save();
            if ($status) {
                return response()->json(['message' => 'Product Updated Successfully', 'status' => 200]);
            } else {
                return response()->json(['message' => 'Something went wrong']);
            }

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::FindorFail($id);
        try {
            @unlink(public_path('admin/images/products/'.$data->image));
            $data->delete();
        } catch (\Exception $e) {
            return $e->getMessage();
        }
        return response()->json(['message'=>'Your Product has been deleted','status'=>200]);
    }
}
