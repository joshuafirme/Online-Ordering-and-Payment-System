<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GrossSaleCtr extends Controller
{
    public function index(Request $request){

        $gs = $this->getGrossSale($request->date_from, $request->date_to);

        if(request()->ajax())
        {
            return datatables()->of($gs)
                ->make(true);
        }
        return view('reports/gross_sale');
    }

    public function getGrossSale($date_from, $date_to){
        $res = DB::table('tblgross_sale as S')
        ->select('S.*', 'description', 'category')
        ->leftJoin('tblmenu as M', 'M.id', '=', 'S.menu_id')
        ->leftJoin('tblcategory as C', 'C.id', '=', 'M.category_id')  
        ->whereBetween(DB::raw('DATE(S.created_at)'), [$date_from, $date_to])
        ->get();

        return $res;
    }
}
