<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginCheckController extends Controller
{
    // public function check(Request $request){
    //     $log=$request->only('email','password');

    //     if(Auth::guard("admin")->attempt($log)){
    //         return"mo";
    //     }
        // return $request;


        public function check(Request $request){
            $data_admin=$request->only("email","password");
            if(Auth::guard('web')->attempt($data_admin)){
                return redirect()->route('Home')->with("ms_admin","Welcome ". Auth::guard('web')->user()->name);
            }else{
                return redirect()->route('login')->with("ms_admin","Email OR Password Incorrect");

            }
            }

            public function logout(){
                Auth::guard("web")->logout();
                return redirect()->route('login');


            }

}
