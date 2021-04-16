<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Redirect, DB;

class DashboardCtr extends Controller
{
    public function index()
    {
        if(session()->get('is-login') !== 'yes'){
   
            return Redirect::to('user-login');
        }
    
        return view('dashboard',[
            'newOrders' => $this->getNewOrders(),
            'walkInSales' => $this->getWalkInSalesToday(),
            'onlineSales' => $this->getOnlineSalesToday(),
            'registeredCustomer' => $this->getRegisteredCustomer()
        ]);
    }

    public function getNewOrders()
    {
        return DB::table('tblorders')->whereDate('created_at', date('Y-m-d'))->count('id');
    }

    public function getWalkInSalesToday()
    {
        return DB::table('tblgross_sale')->where('order_type', 'Walk in')->whereDate('created_at', date('Y-m-d'))->sum('amount');
    }

    public function getOnlineSalesToday()
    {
        return DB::table('tblgross_sale')->where('order_type', 'Online')->whereDate('created_at', date('Y-m-d'))->sum('amount');
    }

    public function getRegisteredCustomer()
    {
        return DB::table('tblcustomer')->count('id');
    }
}
