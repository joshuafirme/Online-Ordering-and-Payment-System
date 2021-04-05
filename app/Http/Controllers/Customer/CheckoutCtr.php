<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB, Input, Auth, Helper;

class CheckoutCtr extends Controller
{
    public function index(){
        if(Auth::check())
        {
            return view('customer.checkout',[
                'cart' => $this->getCart(),
                'cartCount' => $this->getCartCount(),
                'subTotal' => $this->computeSubTotal(),
                'shippingFee' => $this->getShippingFee(),
                'total' => $this->computeTotal()
            ]);
        }else{
            return \Redirect::to('/customer/customer-login'); 
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

    public function getCartCount()
    {
        return DB::table('tblcart') 
                ->where('user_id', Auth::id())
                ->count('id');
    }

    public function computeSubTotal()
    {
        return DB::table('tblcart as C')
                ->select('C.*', 'M.*')
                ->leftJoin('tblmenu AS M', 'M.id', '=', 'C.menu_id')  
                ->where('user_id', Auth::id())
                ->sum('amount');
    }

    public function computeTotal()
    {
        $sub_total = $this->computeSubTotal();

        return $sub_total+$this->getShippingFee();
    }

    public function getShippingFee()
    {     
        $shipping_info = Helper::getShippingInfo()!=null ? Helper::getShippingInfo()->municipality : "";
        if($shipping_info=="Balayan")
        {
            return 50;
        }
        elseif($shipping_info=="Tuy"){
            return 100;
        }else{
            return 50;
        }
    }

    public function computeTotal_ajax($municipality)
    {
        $sub_total = $this->computeSubTotal();

        return $sub_total+(double)$this->getShippingFee_ajax($municipality);
    }

    public function getShippingFee_ajax($municipality)
    {     
        if($municipality=='Balayan')
        {
            return '50';
        }
        elseif($municipality=='Tuy'){
            return '100';
        }else{
            return '50';
        }
    }



    public function placeOrder()
    {
        foreach($this->getCart() as $item)
        {
            DB::table('tblorders')
            ->insert([
                'user_id' => Auth::id(),
                'menu_id' => $item->menu_id,
                'qty' => $item->qty,
                'amount' => $item->amount,
                'status' => 0,
            ]);
        }

        $data = Input::all();

        $this->updateShippingInfo($data);

        \Redirect::to('/payment')->send();
    }

    public function updateShippingInfo($data)
    {
        DB::table('tblcustomer')
        ->where('id', Auth::id())
        ->update([
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
    }

    public function isShippingInfoExists()
    {
        $row=DB::table('tblshipping_address')
                ->where('user_id', Auth::id())->get();

        return $row->count() > 0 ? true : false;
    }
}
