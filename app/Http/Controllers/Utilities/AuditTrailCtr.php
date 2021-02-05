<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AuditTrailCtr extends Controller
{
   public function index(Request $request){

        if(request()->ajax())
        {
            return datatables()->of($this->getAuditTrail($request->date_from, $request->date_to))
                ->make(true);
        }
        return view('utilities.audit_trail');
   }

   public function getAuditTrail($date_from, $date_to){

    return DB::table('tblaudit_trail as A')
        ->select('A.*', 'U.fullname', 'U.role')
        ->leftJoin('tbluser as U', 'U.username', '=', 'A.username') 
        ->whereBetween(DB::raw('DATE(A.created_at)'), [$date_from, $date_to])   
        ->get();   
   }


}
