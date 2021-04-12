<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Auth, Helper, Redirect, Input;

class PurchasedHistoryCtr extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return view('customer.purchased-history',[
                'orders' => $this->getCustomerOrders()
            ]);
        }
        else{
            return Redirect::to('/customer/customer-login'); 
        }
    }

    public function getCustomerOrders()
    {
       $order = DB::table('tblorders')->where('user_id', Auth::id())->orderBy('created_at')->get();
       return $order->unique('order_no');
    }
}
