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
       $order = DB::table('tblorders')
        ->where('user_id', Auth::id())
        ->orderBy('order_no', 'desc')->get();
       return $order->unique('order_no');
    }

    public function cancelOrder(Request $data)
    {
        DB::table('tblorders')
            ->where('order_no', $data['order_no'])
            ->update([
                'status' => -1
            ]);

        return Redirect::to('/purchased-history')->with('success', 'Order #'.$data['order_no'].' was successfully cancelled.'); 
    }

    public function sessionOrderNo($order_no)
    {
        \Session::put('ORDER_NO', $order_no);
        return Helper::getToken($order_no); 
    }
}
