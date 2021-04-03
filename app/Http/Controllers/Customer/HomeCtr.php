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
        return view('customer/home');
    }

    public function displayMenu()
    {
        return DB::table('tblmenu as M')
            ->select('M.*', 'category')
            ->leftJoin('tblcategory AS C', 'C.id', '=', 'M.category_id')
            ->get();
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
