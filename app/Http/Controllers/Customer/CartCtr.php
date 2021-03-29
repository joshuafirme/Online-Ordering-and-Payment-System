<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Input, Auth;

class CartCtr extends Controller
{
    public function index(){
      //  dd(Auth::id());
        return view('customer.cart',[
            'cart' => $this->getCart(),
            'total' => $this->computeTotal()
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
                'amount' => $data['amount'],
                'created_at' => date('Y-m-d h:m:s')
            ]);
        }

    }

    public function getCart()
    {
        return DB::table('tblcart as C')
                ->select('C.*', 'M.*', 'category')
                ->leftJoin('tblmenu AS M', 'M.id', '=', 'C.menu_id') 
                ->leftJoin('tblcategory AS CAT', 'CAT.id', '=', 'M.category_id')   
                ->where('user_id', Auth::id())
                ->get();
    }

    public function computeTotal()
    {
        return DB::table('tblcart as C')
                ->select('C.*', 'M.*')
                ->leftJoin('tblmenu AS M', 'M.id', '=', 'C.menu_id')  
                ->where('user_id', Auth::id())
                ->sum('amount');
    }

    public function increaseQty($menu_id, $qty)
    {
        return DB::table('tblcart as C')
                ->leftJoin('tblmenu AS M', 'M.id', '=', 'C.menu_id') 
                ->where('user_id', Auth::id())
                ->where('menu_id', $menu_id)
                ->update([
                    'C.qty' => DB::raw('C.qty + 1'),
                    'C.amount' => DB::raw('C.amount + M.price'),
                ]);
    }

    public function decreaseQty($menu_id, $qty)
    {
        return DB::table('tblcart as C')
                ->leftJoin('tblmenu AS M', 'M.id', '=', 'C.menu_id') 
                ->where('user_id', Auth::id())
                ->where('menu_id', $menu_id)
                ->update([
                    'C.qty' => DB::raw('C.qty - 1'),
                    'C.amount' => DB::raw('C.amount - M.price'),
                ]);
    }

    public function removeMenu($menu_id)
    {
        DB::table('tblcart')
                ->where('menu_id', $menu_id)
                ->where('user_id', Auth::id())->delete();
    }

    public function isMenuExists($menu_id)
    {
        $data = Input::all();

        $row=DB::table('tblcart')
                ->where('menu_id', $menu_id)
                ->where('user_id', Auth::id());

        return $row->count() > 0 ? TRUE : FALSE;
    }
}
