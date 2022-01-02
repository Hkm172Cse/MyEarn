<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\loginModel;

class LoginController extends Controller
{
    public function index(){
       
        
        return view('Login');
    }

    public function Login_method(Request $req){
        $user = $req->input('user');
        $password = $req->input('password');

        $result = loginModel::where('user','=',$user)->where('password','=',$password)->count();

        if($result==true){
            $req->session()->put('user', $user);
            $req->session()->put('password', $password);
            return 1;
        }else{
            return 0;
        }


    }

    public function logout_method(Request $req){
        $req->session()->flush();
        return redirect('/login');
    }
}
