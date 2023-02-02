<?php

namespace App\Http\Controllers\admin;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class SubCatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cats = Category::get();
        return view('admin.partials.category.subCategoryIndex',compact('cats'));
    }
    public function data(){
        $data = SubCategory::with('category')->latest();

        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="' . $data->id . '" data-toggle="modal"
                data-target="#editModal" class="btn editButton btn-sm btn-warning">Edit</a>';
            })->make(true);
            
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
        $validator = Validator::make($request->all(),[
            'sub_cat_name' =>'required|string',
            'category_id'=>'required'
           ]);
    
           if($validator->fails()){
            return response()->json(['error' => $validator->errors()->all()]);
           }else{
            $data = new SubCategory();
            $data->sub_cat_name = $request->input('sub_cat_name');
            $data->sub_cat_name_slug = Str::slug($request->input('sub_cat_name'));
            $data->category_id = $request->input('category_id');
            $status = $data->save();
            if ($status) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Saved successfully!',
                ]);
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
        $data = SubCategory::FindorFail($id);
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
        $validator = Validator::make($request->all(),[
            'sub_cat_name' =>'required|string',
            'category_id'=>'required'
           ]);
    
           if($validator->fails()){
            return response()->json(['error' => $validator->errors()->all()]);
           }else{
            $data = SubCategory::FindorFail($id);
            $data->sub_cat_name = $request->input('sub_cat_name');
            $data->sub_cat_name_slug = Str::slug($request->input('sub_cat_name'));
            $data->category_id = $request->input('category_id');
            $status = $data->save();
            if ($status) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Updated successfully!',
                ]);
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
        //
    }
}
