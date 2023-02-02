<?php

namespace App\Http\Controllers\admin;

use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Validator;

class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.partials.coupon.index');
    }

    
    public function data(){
        $data = Coupon::latest();

        return DataTables::of($data)
            ->addColumn('action', function ($data) {
                return '<a href="' . $data->id . '" data-toggle="modal"
                data-target="#editModal" class="btn editButton btn-sm btn-warning">Edit</a>
                | <a href="' . $data->id . '" class="btn deleteButton btn-sm btn-danger">Delete</a>';
            })->make(true);
            
    }


    public function status(Request $request){
        //  dd($request->all());
        if($request->mode == 'true'){
            DB::table('coupons')->where('id', $request->id)->update(['status'=>'active']);
            return response()->json(['message'=>'Status Changed!','status' =>200]);
        }else{
            DB::table('coupons')->where('id', $request->id)->update(['status'=>'deactive']);
            return response()->json(['message'=>'Status Changed!','status' =>200]);
        }
            return response()->json(['message'=>'Status Couldnt Changed!']);
        
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
        'title' =>'required|string|unique:coupons,title',
        'code' =>'string|required|unique:coupons,code',
        'status' =>'required',
        'expiration_date' =>'required',
        'money_discount_value'=>'numeric|nullable',
        'percent_discount_value'=>'numeric|nullable'
       ]);

       if($validator->fails()){
        return response()->json(['error' => $validator->errors()->all()]);
       }else{
        $data = new Coupon();
        $data->title = $request->input('title');
        $data->code = $request->input('code');
        $data->status = $request->input('status');
        $data->expiration_date = $request->input('expiration_date');
        $data->percent_discount_value = $request->input('percent_discount_value');
        $data->money_discount_value = $request->input('money_discount_value');
        $status = $data->save();
        if ($status) {
            return response()->json([
                'status' => 200,
                'message' => 'Coupon Saved successfully!',
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
        $data = Coupon::FindorFail($id);
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
            'title' =>'required|string',
            'code' =>'string|required',
            'status' =>'required',
            'expiration_date' =>'required',
            'money_discount_value'=>'numeric|nullable',
            'percent_discount_value'=>'nullable|numeric',
           ]);
    
           if($validator->fails()){
            return response()->json(['error' => $validator->errors()->all()]);
           }else{
            $data = Coupon::FindorFail($id);
            $data->title = $request->input('title');
            $data->code = $request->input('code');
            $data->status = $request->input('status');
            $data->expiration_date = $request->input('expiration_date');
            $data->percent_discount_value = $request->input('percent_discount_value');
            $data->money_discount_value = $request->input('money_discount_value');
            $status = $data->save();
            if ($status) {
                return response()->json([
                    'status' => 200,
                    'message' => 'Coupon Updated successfully!',
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
        $data = Coupon::FindorFail($id);
        $status = $data->delete();
        if ($status) {
            return response()->json([
                'status' => 200,
                'message' => 'Coupon Deleted Successfully!',
            ]);
        }
    }
}
