<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerInfoCtr extends Controller
{
    public function index(){
        
        if(request()->ajax())
        {
            return datatables()->of($this->getCustomer())
                ->make(true);
        }

        return view('reports/customer_info');
    }

    public function getCustomer(){
        return DB::table('tblcustomer')
                ->select('tblcustomer.*', DB::raw('date(created_at) as created_at'))
                ->get();
    }
    
}
