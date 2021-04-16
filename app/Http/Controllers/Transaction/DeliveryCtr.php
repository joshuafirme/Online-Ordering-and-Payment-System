<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utilities\User;
use DB, Input;

class DeliveryCtr extends Controller
{
    private $module = 'Transaction';

    public function index()
    {
     //   dd($this->getPendingOrders());
        $user = new User;
        $user->isUserAuthorize($this->module);
    }

    public function displayPendingOrders()
    {
        if(request()->ajax())
        {
            return datatables()->of($this->getPendingOrders())
                ->addColumn('action', function($o){
                    $button = ' <a class="btn btn-sm btn-primary btn-show-order" order-no="'. $o->order_no .'" user-id="'. $o->user_id .'" 
                    data-toggle="modal" data-target="#orderModal">Show order</a>';

                    $button .= ' <a class="btn btn-sm btn-danger btn-cancel-order" order-no="'. $o->order_no .'" user-id="'. $o->user_id .'" 
                    data-toggle="modal" data-target="#cancelModal">Cancel</a>';
       
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
        return view('transaction.delivery-pending');
    }

    public function getPendingOrders()
    {
        $data = DB::table('tblorders as O')
                ->select('O.*', 'C.fullname', 'C.phone_no', 'C.email', 'O.created_at', 'O.status')
                ->leftJoin('tblcustomer AS C', 'C.id', '=', 'O.user_id') 
                ->where('O.status', 1)
                ->get();

        return $data->unique('order_no');
    }

    public function displayPreparingOrders()
    {
        if(request()->ajax())
        {
            return datatables()->of($this->getPreparingOrders())
                ->addColumn('action', function($o){
                    $button = ' <a class="btn btn-sm btn-primary btn-show-order" order-no="'. $o->order_no .'" user-id="'. $o->user_id .'" 
                    data-toggle="modal" data-target="#orderModal">Show order</a>';
       
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
        return view('transaction.delivery-preparing');
    }

    public function getPreparingOrders()
    {
        $data = DB::table('tblorders as O')
                ->select('O.*', 'C.fullname', 'C.phone_no', 'C.email', 'O.created_at', 'O.status')
                ->leftJoin('tblcustomer AS C', 'C.id', '=', 'O.user_id') 
                ->where('O.status', 2)
                ->get();

        return $data->unique('order_no');
    }

    public function displayDispatchOrders()
    {
        if(request()->ajax())
        {
            return datatables()->of($this->getDispatchOrders())
                ->addColumn('action', function($o){
                    $button = ' <a class="btn btn-sm btn-primary btn-show-order" order-no="'. $o->order_no .'" user-id="'. $o->user_id .'" 
                    data-toggle="modal" data-target="#orderModal">Show order</a>';
       
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
        return view('transaction.delivery-dispatch');
    }

    public function getDispatchOrders()
    {
        $data = DB::table('tblorders as O')
                ->select('O.*', 'C.fullname', 'C.phone_no', 'C.email', 'O.created_at', 'O.status')
                ->leftJoin('tblcustomer AS C', 'C.id', '=', 'O.user_id') 
                ->where('O.status', 3)
                ->get();

        return $data->unique('order_no');
    }

    public function displayDeliveredOrders(Request $request)
    {
        if(request()->ajax())
        {
            return datatables()->of($this->getDeliveredOrders($request->date_from, $request->date_to))
                ->addColumn('action', function($o){
                    $button = ' <a class="btn btn-sm btn-primary btn-show-order" order-no="'. $o->order_no .'" user-id="'. $o->user_id .'" 
                    data-toggle="modal" data-target="#orderModal">Show order</a>';
       
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
        return view('transaction.delivery-delivered');
    }

    public function getDeliveredOrders($date_from, $date_to)
    {
        $data = DB::table('tblorders as O')
                ->select('O.*', 'C.fullname', 'C.phone_no', 'C.email', 'O.created_at', 'O.status')
                ->leftJoin('tblcustomer AS C', 'C.id', '=', 'O.user_id') 
                ->where('O.status', 4)
                ->whereBetween(DB::raw('DATE(O.updated_at)'), [$date_from, $date_to])
                ->get();

        return $data->unique('order_no');
    }

    public function displayCancelledOrders()
    {
        if(request()->ajax())
        {
            return datatables()->of($this->getCancelledOrders())
                ->addColumn('action', function($o){
                    $button = ' <a class="btn btn-sm btn-primary btn-show-order" order-no="'. $o->order_no .'" user-id="'. $o->user_id .'" 
                    data-toggle="modal" data-target="#orderModal">Show order</a>';
       
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        
        return view('transaction.delivery-cancelled');
    }

    public function getCancelledOrders()
    {
        $data = DB::table('tblorders as O')
                ->select('O.*', 'C.fullname', 'C.phone_no', 'C.email', 'O.created_at', 'O.status')
                ->leftJoin('tblcustomer AS C', 'C.id', '=', 'O.user_id') 
                ->where('O.status', -1)
                ->get();

        return $data->unique('order_no');
    }

    public function doPrepare()
    {
        $data = Input::all();

        DB::table('tblorders')
                ->where('order_no', $data['order-no'])
                ->update([
                    'status' => 2,
                    'updated_at' => date('Y-m-d h:m:s')
                ]);

        return redirect('/delivery/pending')->with('success', 'Order #'.$data['order-no'].' was successfully prepared');
    }

    public function doDispatch()
    {
        $data = Input::all();

        DB::table('tblorders')
                ->where('order_no', $data['order-no'])
                ->update([
                    'status' => 3,
                    'updated_at' => date('Y-m-d h:m:s')
                ]);

        return redirect('/delivery/preparing')->with('success', 'Order #'.$data['order-no'].' was successfully dispatch');
    }

    public function doDeliver()
    {
        $data = Input::all();

        DB::table('tblorders')
                ->where('order_no', $data['order-no'])
                ->update([
                    'status' => 4,
                    'updated_at' => date('Y-m-d h:m:s')
                ]);

        return redirect('/delivery/preparing')->with('success', 'Order #'.$data['order-no'].' was successfully delivered');
    }

    public function cancelOrder()
    {
        $data = Input::all();

        DB::table('tblorders')
                ->where('order_no', $data['order-no'])
                ->update([
                    'status' => -1,
                    'updated_at' => date('Y-m-d h:m:s')
                ]);

        return redirect('/delivery/pending')->with('success', 'Order #'.$data['order-no'].' was successfully cancelled');
    }



    public function showOrders($order_no)
    {
        return DB::table('tblorders as O')
                ->select('O.*', 'C.*', 'M.*', 'category', 'O.created_at', 'O.amount')
                ->leftJoin('tblcustomer AS C', 'C.id', '=', 'O.user_id') 
                ->leftJoin('tblmenu AS M', 'M.id', '=', 'O.menu_id')  
                ->leftJoin('tblcategory AS CT', 'CT.id', '=', 'M.category_id')  
                ->where('O.order_no', $order_no)
                ->get();
    }

    public static function getCustomerInfo_ajax($user_id)
    {
       return DB::table('tblcustomer')->where('id', $user_id)->get();
    }

    public static function getShippingInfo_ajax($user_id)
    {
       return DB::table('tblshipping_address')->where('user_id', $user_id)->get();
    }

    public function getShippingFee_ajax($user_id)
    {     
        $shipping_info = DB::table('tblshipping_address')
                        ->where('user_id', $user_id)
                        ->value('municipality');

        if($shipping_info=="Balayan")
        {
            return 50;
        }elseif($shipping_info=="Tuy"){
            return 100;
        }else{
            return 0;
        }
    }

    public function getOrderSubTotalAmount_ajax($order_no)
    {
        return DB::table('tblorders')->where('order_no', $order_no)->sum('amount');
    }

    public function getOrderTotalAmount_ajax($order_no, $user_id)
    {
        $sub_total = DB::table('tblorders')->where('order_no', $order_no)->sum('amount');
        $shipping_fee = $this->getShippingFee_ajax($user_id);
        return $sub_total + $shipping_fee;
    }
    
}
