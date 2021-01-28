<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Maintenance\Menu;

class CashieringCtr extends Controller
{
    public function index(){

        
        return view('transaction/cashiering');
    }

    public function search($search_key){
        $m = new Menu;
        return $m->getAvailableMenu($search_key);
    }

}
