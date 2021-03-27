<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Input, Redirect;

class SignupCtr extends Controller
{
    public function index(){
        return view('customer/signup');
    }

    public function signup()
    {
        $data = Input::all();

        DB::table('tblcustomer')
        ->insert([
            'username' => $data['username'],
            'fullname' => $data['fullname'],
            'phone_no' => $data['phone_no'],
            'password' => \Hash::make($data['password']),
            'created_at' => date('Y-m-d h:m:s')
        ]);

    return Redirect::to('/signup')->with('success', 'You are now registered successfully!'); 
    }
}
