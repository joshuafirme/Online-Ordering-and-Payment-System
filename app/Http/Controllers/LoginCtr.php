<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Utilities\User;
use Redirect;

class LoginCtr extends Controller
{
    public function index(){
      //  dd(session()->get('emp-username'));
        return view('login');
    }

    public function login(Request $request){
        $username = $request->input('username');
        $password = $request->input('password');

        if($this->isAuthUser($username, $password))
        {
            session()->put('emp-username', $username);
            session()->put('is-login', 'yes');
            return Redirect::to('dashboard');
        }
        else{
            return Redirect::to('/user-login')->with('invalid', 'Invalid username or password'); 
        }
    }

    public function isAuthUser($username, $password){
        $result = DB::table('tbluser')
            ->where('username', $username)
            ->where('password', $password)
            ->get();
        
        if($result->count() > 0){
            return true;
        }
        else{
            return false;
        }
    }

    public function logout(){
        session()->forget('emp-username');
        session()->put('is-login', 'no');

        return Redirect::to('/user-login'); 
    }
}
