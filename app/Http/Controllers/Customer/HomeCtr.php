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
        return view('customer.home');
    }

    public function authCheck()
    {
        return Helper::isAuth();
    }

    public function displayMenu()
    {
        $res = DB::table('tblgross_sale as S')
        ->select('M.id', 'S.menu_id', 'S.order_type', 'M.description', 'M.price', 'M.preparation_time', 'category','M.image', 'M.status')
        ->leftJoin('tblmenu as M', 'M.id', '=', 'S.menu_id')
        ->leftJoin('tblcategory as C', 'C.id', '=', 'M.category_id')  
        ->groupBy('M.id', 'S.menu_id', 'S.order_type', 'M.description', 'category','M.price', 'M.preparation_time', 'M.image', 'M.status')
        ->having(DB::raw('SUM(S.qty)'), '>', 4)
        ->orderBy(DB::raw('SUM(S.qty)'), 'desc')
        ->limit(9)
        ->get();

    return $res->unique('menu_id');
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
