<?php

namespace App\Http\Controllers\Reports;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Utilities\User;

class BestSellerCtr extends Controller
{
    private $module = 'Reports';

    public function index(Request $request){

        $user = new User;
        $user->isUserAuthorize($this->module);

        
        $best_seller = $this->getItems();

        if(request()->ajax())
        {
            return datatables()->of($best_seller)
            ->addColumn('qty', function($best_seller)
            {
                $number_of_purchase = $this->getNumberOfPurchase($best_seller->menu_id);
                $p = '<span class="text-success">'.$number_of_purchase.'</span>';
                return $p;
            })
            ->rawColumns(['qty'])
            ->make(true);
        }

        return view('reports/best_seller');
    }

    public function getItems()
    {
        $res = DB::table('tblgross_sale as S')
            ->select('S.menu_id', 'S.order_type', 'M.description', 'category')
            ->leftJoin('tblmenu as M', 'M.id', '=', 'S.menu_id')
            ->leftJoin('tblcategory as C', 'C.id', '=', 'M.category_id')  
            ->groupBy('S.menu_id', 'S.order_type', 'M.description', 'category')
            ->having(DB::raw('SUM(S.qty)'), '>', 4)
            ->orderBy(DB::raw('SUM(S.qty)'), 'desc')
            ->limit(9)
            ->get();

        return $res->unique('menu_id');
    }

    public function getNumberOfPurchase($menu_id)
    {
        return DB::table('tblgross_sale as S')
            ->leftJoin('tblmenu as M', 'M.id', '=', 'S.menu_id')
            ->where('S.menu_id', $menu_id)
            ->sum('S.qty');
    }
}
