<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Auth, Helper, Redirect;

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
}
