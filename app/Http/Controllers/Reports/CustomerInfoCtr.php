<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Utilities\User;

class CustomerInfoCtr extends Controller
{
    private $module = 'Reports';

    public function index(Request $request){

        $user = new User;
        $user->isUserAuthorize($this->module);
        
        if(request()->ajax())
        {
            return datatables()->of($this->getCustomer())
                ->addColumn('total_purchased', function($c)
                {
                    $number_of_purchase = $this->getAmountOfPurchase($c->id);
                    $p = '<span class="text-success">₱'.$number_of_purchase.'</span>';
                    return $p;
                })
                ->rawColumns(['total_purchased'])
                ->make(true);
        }

        return view('reports/customer_info');
    }

    public function getCustomer()
    {
        return DB::table('tblcustomer')
                ->select('tblcustomer.*', DB::raw('date(created_at) as created_at'))
                ->get();
    }

    public function getAmountOfPurchase($user_id)
    {
        return DB::table('tblorders')
            ->where('user_id', $user_id)
            ->sum('amount');
    }
    
}
