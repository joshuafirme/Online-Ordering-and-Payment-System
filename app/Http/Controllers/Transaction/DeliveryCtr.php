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
        $this->displayPendingOrders();
        return view('transaction.delivery');
    }

    public function displayPendingOrders()
    {
        if(request()->ajax())
        {
            return datatables()->of($this->getPendingOrders())
                ->addColumn('action', function($o){
                    $button = ' <a class="btn btn-sm btn-primary btn-show-order" order-no="'. $o->order_no .'" user-id="'. $o->user_id .'" 
                    data-toggle="modal" data-target="#orderModal">View order</a>';

                    $button .= ' <a class="btn btn-sm btn-success btn-prepare-order" order-no="'. $o->order_no .'" user-id="'. $o->user_id .'">Prepare</a>';

                    $button .= ' <a class="btn btn-sm btn-danger btn-cancel-order" order-no="'. $o->order_no .'" user-id="'. $o->user_id .'" 
                    data-toggle="modal" data-target="#cancelModal">Cancel</a>';
       
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
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

    public function showOrders($order_no)
    {
        return DB::table('tblorders as O')
                ->select('O.*', 'C.fullname', 'C.phone_no', 'C.email', 'O.created_at', 'O.status')
                ->leftJoin('tblcustomer AS C', 'C.id', '=', 'O.user_id') 
                ->leftJoin('tblmenu AS M', 'M.id', '=', 'O.menu_id') 
                ->leftJoin('tblcategory AS CT', 'CT.id', '=', 'M.category_id') 
                ->where('O.order_no', $order_no)
                ->get();
    }
}
