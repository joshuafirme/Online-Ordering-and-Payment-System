<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Input, Auth;

class CartCtr extends Controller
{
    public function index(){
        return view('customer.cart',[
            'cart' => $this->getCart()
        ]);
    }

    public function addToCart()
    {
        $data = Input::all();

        if($this->isMenuExists($data['menu_id']))
        {
            DB::table('tblcart')
            ->where('user_id', Auth::id())
            ->where('menu_id', $data['menu_id'])
            ->update([
                'qty' => DB::raw('qty + 1'),
                'amount' => DB::raw('amount + '.$data['amount']),
            ]);
        }else{
            DB::table('tblcart')
            ->insert([
                'user_id' => Auth::id(),
                'menu_id' => $data['menu_id'],
                'qty' => 1,
                'amount' => $data['amount']
            ]);
        }

    }

    public function getCart()
    {
        return DB::table('tblcart as C')
                ->select('C.*', 'M.*')
                ->leftJoin('tblmenu AS M', 'M.id', '=', 'C.menu_id')  
                ->where('user_id', Auth::id())
                ->get();
    }

    public function isMenuExists($menu_id)
    {
        $data = Input::all();

        $row=DB::table('tblcart')->where('menu_id', $menu_id);

        return $row->count() > 0 ? TRUE : FALSE;
    }
}
