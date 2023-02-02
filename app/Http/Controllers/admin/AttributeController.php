<?php

namespace App\Http\Controllers\admin;

use App\Models\Product;
use App\Models\Attribute;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\MultipleImages;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class AttributeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function multipleImage(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image.*' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()]);
        } else {
            try {
                $images = $request->file('image');
                foreach ($images as $image) {
                    $file = $image;
                    $filename = date('Ymdhms'). Str::random(5) . '.' . $file->getClientOriginalExtension();
                    Image::make($file)->resize(250, 300)->save(public_path('admin/images/products/attributes/') . $filename);
                    MultipleImages::create([
                        'product_id' => $request->product_id,
                        'attribute_image' => $filename,
                    ]);
                }
            } catch (\Exception $e) {
                return response()->json(['error' => $e->getMessage()]) ;
            }
            return response()->json(['message'=>'Multiple images uploaded','status'=>200]);
        }
    }

    public function multipleImageDelete($id){
       $data = MultipleImages::FindorFail($id);
        if($data){
            @unlink(public_path('admin/images/products/attributes/'.$data->attribute_image));
            $data->delete();
        }
        return response()->json(['message'=>'Image deleted']);
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
        $data = $request->all();
        $product = Product::find($data['product_id']);
        $product_stock = $product->total_stock;
        $sum = $product_stock;
        foreach ($data['size'] as $key => $val) {
            if (!empty($val)) {
                $attribute = new Attribute();
                $attribute['attribute_size'] = $val;
                $attribute['attribute_stock'] = $data['stock'][$key];
                $attribute['attribute_color'] = $data['color'][$key];
                $attribute['product_id'] = $data['product_id'];
                $attribute->save();
                $sum += $data['stock'][$key];  //updating the total product stock
            }
        }
        $product->update(['total_stock' => $sum]);
        return response()->json(['message'=>'Product attribute added','status'=>200]);

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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $attribute = Attribute::FindorFail($id);
        // $attribute = Attribute::find($id);
        if($attribute){

            $product_id = $attribute->product_id;
            $attribute_stock = $attribute->attribute_stock;
            $product = Product::find($product_id);
            $product->update(['total_stock' => $product->total_stock - $attribute_stock]);
            $attribute->delete();
        }
        return response()->json(['message'=>'Attribute deleted','status'=>200]);
    }
}
