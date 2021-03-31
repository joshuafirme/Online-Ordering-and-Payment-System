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

    public function terms_and_condition(){
        return view('customer/terms-and-condition');
    }

    public function signup()
    {
        $data = Input::all();

        if($this->isUsernameExists($data['username']))
        {
            return Redirect::to('/signup')->with('invalid', 'Username is already exists!'); 
        }
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

    public function isUsernameExists($username)
    {
        $data = Input::all();

        $row=DB::table('tblcustomer')->where('username', $username);

        return $row->count() > 0 ? TRUE : FALSE;
    }
}
