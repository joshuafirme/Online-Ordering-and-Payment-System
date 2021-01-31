<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect;

class LoginCtr extends Controller
{
    public function index(){
        return view('login');
    }

    public function login(Request $request){

        if($request->input('username') == 'admin' && $request->input('password') == '123'){

            return Redirect::to('/');
        }
        else{
            return Redirect::to('/user-login')->with('invalid', 'Invalid username or password'); 
        }
    }
}
