<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Input, Auth;

class CartCtr extends Controller
{
    public function index(){
        return view('customer.cart');
    }

    public function addToCart()
    {
        $data = Input::all();

        DB::table('tblcart')
            ->insert([
                'user_id' => Auth::id(),
                'menu_id' => $data['menu_id'],
                'qty' => 1,
                'amount' => $data['amount']
            ]);
    }
}
