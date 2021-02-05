<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BestSellerCtr extends Controller
{
    public function index(Request $request){
        
        $best_seller = $this->getItems($request->date_from, $request->date_to);
      
        session()->put('date-from', $request->date_from);
        session()->put('date-to', $request->date_to);

        if(request()->ajax())
        {
            return datatables()->of($best_seller)
            ->addColumn('qty', function($best_seller)
            {
                $number_of_purchase = $this->getNumberOfPurchase($best_seller->description, session()->get('date-from'), session()->get('date-to'));
                $p = '<span class="text-success">'.$number_of_purchase.'</span>';
                return $p;
            })
            ->rawColumns(['qty'])
            ->make(true);
        }

        return view('reports/best_seller');
    }

    public function getItems($date_from, $date_to){
        $res = DB::table('tblgross_sale as S')
            ->select('S.*', 'M.description', 'category')
            ->leftJoin('tblmenu as M', 'M.id', '=', 'S.menu_id')
            ->leftJoin('tblcategory as C', 'C.id', '=', 'M.category_id')  
            ->whereBetween(DB::raw('DATE(S.created_at)'), [$date_from, $date_to])
            ->orderBy('S.qty')
            ->get();

        return $res;
    }

    public function getNumberOfPurchase($desc, $date_from, $date_to){
        return DB::table('tblgross_sale as S')
            ->whereBetween(DB::raw('DATE(S.created_at)'), [$date_from, $date_to])
            ->leftJoin('tblmenu as M', 'M.id', '=', 'S.menu_id')
            ->where('M.description', $desc)
            ->sum('qty');
    }
}
