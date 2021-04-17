<?php

namespace App\Http\Controllers\Customer;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth, Redirect, Helper, Session;

class HomeCtr extends Controller
{
    public function index()
    {
        Helper::updateMenuStatus();
        Auth::loginUsingId(Session::get('customer-id'));
        return view('customer/home');
    }

    public function displayMenu()
    {
        return DB::table('tblmenu as M')
                ->select('M.*', 'category')
                ->distinct('GS.menu_id')
                ->leftJoin('tblcategory AS C', 'C.id', '=', 'M.category_id')
                ->leftJoin('tblgross_sale AS GS', 'GS.menu_id', '=', 'M.id')
                ->orderBy('GS.amount',  'desc')
                ->get();
    }

    public function countMaxOrders()
    {
        return DB::table('tblmenu as M')
            ->leftJoin('tblgross_sale AS GS', 'GS.menu_id', '=', 'M.id')
            ->max('GS.amount');
    }

    public function countMinOrders()
    {
        return DB::table('tblmenu as M')
            ->leftJoin('tblgross_sale AS GS', 'GS.menu_id', '=', 'M.id')
            ->mix('GS.amount');
    }

    public function displayMenuByCategory($category)
    {
        return DB::table('tblmenu as M')
            ->select('M.*', 'category')
            ->leftJoin('tblcategory AS C', 'C.id', '=', 'M.category_id')
            ->where('category', $category)
            ->get();
    }

    public function displayGallery()
    {
        return DB::table('tblgallery')->paginate(12);
    }
}
