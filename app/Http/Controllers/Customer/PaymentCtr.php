<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Input, Auth;
use Luigel\Paymongo\Facades\Paymongo;

class PaymentCtr extends Controller
{
    public function index()
    { 
      //  dd($this->getToken());
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

            session()->forget('source');
            return redirect('/after-payment')->send();
        }
    }

    public function cashOnDelivery()
    {
        DB::table('tblorders')
            ->where('user_id', Auth::id())
            ->where('order_no',  \Session::get('ORDER_NO'))
            ->update([
                'payment_method' => 'COD',
                'status' => 1,
            ]);

        return redirect('/cod-confirmation')->send();
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
