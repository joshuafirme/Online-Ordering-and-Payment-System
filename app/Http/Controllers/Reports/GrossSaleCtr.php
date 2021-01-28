<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrossSaleCtr extends Controller
{
    public function index(){

        $gs = $this->getGrossSale();

        if(request()->ajax())
        {
            return datatables()->of($gs)
                ->make(true);
        }
        return view('reports/gross_sale');
    }

    public function getGrossSale(){
        $res = DB::table('tblgross_sale as S')
        ->select('S.*', 'description', 'category')
        ->leftJoin('tblmenu as M', 'M.id', '=', 'S.menu_id')
        ->leftJoin('tblcategory as C', 'C.id', '=', 'M.category_id')  
        ->get();

        return $res;
    }
}
