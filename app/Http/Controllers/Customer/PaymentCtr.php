<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Input, Auth, Helper;
use Luigel\Paymongo\Facades\Paymongo;

class PaymentCtr extends Controller
{
    public function index()
    { 
      //  dd($this->getToken());
     // session()->forget('source');   
        if(Auth::check())
        {
            if($this->isTokenValid())
            {
                return view('customer.payment');
            }
            else
            {
              //  return redirect('/payment/error')->with('invalid', 'An error occured! Please try again.');
              dd('An error occured! Please try again.');
            }
        }
        else
        {
            return \Redirect::to('/customer/customer-login'); 
        }
    }

    public function isTokenValid()
    {
        $url = url()->current();    
        $token = substr($url, strpos($url, "n=") + 2);  

        $row=DB::table('tblorder_token')
            ->where('order_no', \Session::get('ORDER_NO'))
            ->where('token', $token)
            ->get();

        return $row->count()>0 ? true : false;
    }

    public function getToken()
    {
        return DB::table('tblorder_token')
                ->where('order_no', \Session::get('ORDER_NO'))
                ->value('token');
    }

    public function gcashPayment()
    {     
        $source_ss = session()->get('source');   

            if(empty($source_ss)) {
            $source = Paymongo::source()->create([
                'type' => 'gcash',
                'amount' => \Session::get('TOTAL_CHECKOUT'),
                'currency' => 'PHP',
                'redirect' => [
                    'success' => route('gcashpayment'),
                    'failed' => route('gcashpayment')
                ]
            ]);
                $source_ss = [
                        'source_id' => $source->id,            
                        'amount' => $source->amount,
                        'status' => $source->status           
                ];
                session()->put('source', $source_ss);
    
    
            return redirect($source->getRedirect()['checkout_url']);      
            }
            else{
                Paymongo::payment()
                ->create([
                    'amount' => $source_ss['amount'],
                    'currency' => 'PHP',
                    'description' => 'Davids Grill Test Payment',
                    'statement_descriptor' => 'Test',
                    'source' => [
                        'id' => $source_ss['source_id'],
                        'type' => 'source'
                    ]
                ]);
    
                DB::table('tblorders')
                ->where('user_id', Auth::id())
                ->where('order_no',  \Session::get('ORDER_NO'))
                ->update([
                    'payment_method' => 'GCash',
                    'status' => 1,
                ]);
    
                
                $order = $this->getOrderDetails(\Session::get('ORDER_NO'));
    
                for($i = 0; $i < $order->count(); $i++){
                    $this->recordSales(
                        $order[$i]->menu_id,
                        $order[$i]->qty,
                        $order[$i]->amount,
                        'Gcash'
                    );    
                    \Helper::adjustQty($order[$i]->menu_id, $order[$i]->qty);
                }
    
                session()->forget('source');
                return redirect('/after-payment')->send();
            }
     
    }

    public function cashOnDelivery()
    {
        if(Helper::isVerified())
        {
            DB::table('tblorders')
            ->where('user_id', Auth::id())
            ->where('order_no',  \Session::get('ORDER_NO'))
            ->update([
                'payment_method' => 'COD',
                'status' => 1,
            ]);

            $order = $this->getOrderDetails(\Session::get('ORDER_NO'));

            for($i = 0; $i < $order->count(); $i++){
                $this->recordSales(
                    $order[$i]->menu_id,
                    $order[$i]->qty,
                    $order[$i]->amount,
                    'COD'
                );    
                \Helper::adjustQty($order[$i]->menu_id, $order[$i]->qty);
            }

        return redirect('/cod-confirmation')->send();
        }
        else
        {
            return redirect('/payment/token='.$this->getToken())->with('invalid', 'You need to verify your account first before proceeding to COD')->send();
        }
       
    }
    
    public function recordSales($menu_id, $qty, $amount, $payment_method)
    {
        $trans_no = \Helper::getTransactionNumber();
        DB::table('tblgross_sale')
            ->insert([
                'transaction_no' => $trans_no,
                'menu_id' => $menu_id,
                'qty' => $qty,
                'amount' => $amount,
                'order_type' => 'Online',
                'payment_method' => $payment_method,
                'created_at' => date('Y-m-d h:m:s'),
                'updated_at' => date('Y-m-d h:m:s')
            ]);
    }

    public function getOrderDetails($order_no)
    {
        return DB::table('tblorders')
        ->where('order_no', $order_no)
        ->get();
    }


    public function codConfirmation()
    {
        return view('customer.cod-confirmation');
    }

    public function afterPayment()
    {
        return view('customer.gcash-after-payment');
    }
}
