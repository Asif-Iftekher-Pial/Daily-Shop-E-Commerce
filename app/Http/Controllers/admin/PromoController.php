<?php

namespace App\Http\Controllers\admin;

use App\Models\Promo;
use App\Models\Banner;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\Validator;

class PromoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Promo::orderby('id','desc')->paginate(5);
        return view('admin.partials.promo.promo',compact('data'));
    }
    public function status(Request $request)
    {
        if ($request->mode == 'true') {
            DB::table('promos')->where('id', $request->id)->update(['status' => 'active']);
        } else {
            DB::table('promos')->where('id', $request->id)->update(['status' => 'deactive']);
        }
        return response()->json([
            'message' => 'Status Changed Successfully',
            'status' => 200,
        ]);
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
        // dd($data);
        $validator = Validator::make($data,[
            'title' => 'required|string',
            'summary'=> 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->all()], 400);
        }else{
           
            if ($request->file('image')) {
                try {
                    $file = $request->file('image');
                    $filename = date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                    Image::make($file)->resize(300,220)->save(public_path('admin/images/promo/') . $filename);
                } catch (\Exception $e) {
                    return response()->json(['message'=>$e->getMessage(),'status'=>200]);
                }
            }
            
            $data['image']=$filename;
            Promo::create($data);
            return response()->json(['message'=>'Promo created successfully','status'=>200]);
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
        $data = Promo::FindorFail($id);
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
        $data = $request->all();
        $validator = Validator::make($data,[
            'title' => 'nullable|string',
            'summary'=> 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validator->fails()){
            return response()->json(['error' => $validator->errors()->all()], 400);
        }else{
            $getData = Promo::FindorFail($id);

            if ($request->file('image')) {
                try {
                    $file = $request->file('image');
                    $filename = date('Ymdhms') . '.' . $file->getClientOriginalExtension();
                    Image::make($file)->resize(1920,700)->save(public_path('admin/images/promo/') . $filename);
                    @unlink(public_path('admin/images/promo/'.$getData->image));
                } catch (\Exception $e) {
                    return response()->json(['message'=>$e->getMessage(),'status'=>200]);
                }
            }

            $data['image']=$filename;
            $getData->fill($data)->save();
            return response()->json(['message'=>'Promo created successfully','status'=>200]);
       
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
        $data = Promo::Findorfail($id);
        if($data){
            @unlink(public_path('admin/images/promo/'.$data->image));
            $data->delete();
        }
        return response()->json(['message'=>'Promo removed successfully','status'=>200]);
    }
}
