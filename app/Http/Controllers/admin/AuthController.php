<?php

namespace App\Http\Controllers\admin;

use Carbon\Carbon;
use App\Models\Product;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;

class AuthController extends Controller
{
    public function home(){

        $data = Product::select('id','created_at')->get()->groupBy(function($data){
           return Carbon::parse($data->created_at)->format('M');
        });

        $months = [];
        $productCount=[];
        foreach ($data as $month => $value) {
            $months[]=$month;
            $productCount[]=count($value);
        }
        // dd($months,$productCount);
        return view('admin.partials.home.home',compact('months','productCount'));
    }

    public function login(){
        return view('admin.partials.auth.login');
    }

    public function login_confirm(Request $request){
       
        $validator = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);
        if($validator){
            
            $credentials = $request->only('email', 'password');
            if(Auth::guard('admin')->attempt($credentials)){
                $request->session()->regenerate();
                if ($request->has('rememberMe')) {
                    Cookie::queue('backendcookieNameEmail', $request->email, 1440); /* 1440 means cookie will clear after 24 hours*/
                    Cookie::queue('backendcookieNamePassword', $request->password, 1440);
                }
                return redirect()->route('dashboard');
               
            }else{
               
                return back()->with('error','Incorrect email or password');
            }
        }

    }

    public function logout(){
        Auth::logout();
        session()->flush();
        return redirect()->route('login')->with('success','Logout Successfull');
    }
}
