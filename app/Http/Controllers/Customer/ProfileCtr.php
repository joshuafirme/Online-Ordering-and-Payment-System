<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Auth, Helper, Redirect, Input;

class ProfileCtr extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return view('customer.profile');
        }
        else{
            return Redirect::to('/customer/customer-login'); 
        }

    }

    public function updateInsert()
    {
        $data = Input::all();

        DB::table('tblcustomer')
                ->where('id', Auth::id())
                ->update([
                    'fullname' => $data['fullname'],
                    'email' => $data['email'],
                    'phone_no' => $data['phone_no']
                ]);

        if($this->isShippingInfoExists())
        {
            DB::table('tblshipping_address')
                ->where('user_id', Auth::id())
                ->update([
                    'municipality' => $data['municipality'],
                    'brgy' => $data['brgy'],
                    'nearest_landmark' => $data['nearest_landmark']
                ]);
        }else{
            DB::table('tblshipping_address')
                ->insert([
                    'user_id' => Auth::id(),
                    'municipality' => $data['municipality'],
                    'brgy' => $data['brgy'],
                    'nearest_landmark' => $data['nearest_landmark']
                ]);
        }

        Redirect::to('/profile')->with('success', 'Your information was updated succesfully.')->send();
    }

    public function isShippingInfoExists()
    {
        $row=DB::table('tblshipping_address')
                ->where('user_id', Auth::id())->get();

        return $row->count() > 0 ? true : false;
    }
}
