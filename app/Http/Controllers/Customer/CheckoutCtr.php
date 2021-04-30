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
                ->select('C.*', 'M.*', 'category', 'C.qty')
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
        if($shipping_info=="BALAYAN")
        {
            return 50;
        }
        elseif($shipping_info=="TUY"){
            return 100;
        }else{
            return 50;
        }
    }

    public function computeTotal_ajax($municipality)
    {
        $sub_total = $this->computeSubTotal();
        $total = $sub_total+(double)$this->getShippingFee_ajax($municipality);
        \Session::put('TOTAL_CHECKOUT', $total);
        return $total;
    }

    public function getShippingFee_ajax($municipality)
    {     
        if($municipality=='BALAYAN')
        {
            return '50';
        }
        elseif($municipality=='TUY'){
            return '100';
        }else{
            return '50';
        }
    }


    public function placeOrder()
    {
        $data = Input::all();

        $order_no = \Helper::getOrderNumber();
        \Session::put('ORDER_NO', $order_no);

        foreach($this->getCart() as $item)
        {
            DB::table('tblorders')
            ->insert([
                'order_no' => $order_no,
                'user_id' => Auth::id(),
                'menu_id' => $item->menu_id,
                'qty' => $item->qty,
                'amount' => $item->amount,
                'status' => 0,
                'created_at' => date('Y-m-d h:m:s'),
            ]);
        }
        DB::table('tblorder_token')
            ->insert([
                'order_no' => $order_no,
                'token' => $data['token'],
            ]);
        DB::table('tblcart')->where('user_id', Auth::id())->delete();


        $this->updateShippingInfo($data);

        \Redirect::to('/payment/token='.$data['token'])->send();
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
                    'flr_bldg_blk' => $data['flr_bldg_blk'],
                    'nearest_landmark' => $data['nearest_landmark']
                ]);
        }else{
            DB::table('tblshipping_address')
                ->insert([
                    'user_id' => Auth::id(),
                    'municipality' => $data['municipality'],
                    'brgy' => $data['brgy'],
                    'flr_bldg_blk' => $data['flr_bldg_blk'],
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
