<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB, Input;

class IdentityVerificationCtr extends Controller
{
    private $module = 'Transaction';

    public function index()
    {
        if(request()->ajax())
        {
            return datatables()->of($this->getCustomerUploads())
                ->addColumn('action', function($c){
                    $button = ' <a class="btn btn-sm btn-primary btn-upload-details" user-id="'. $c->user_id .'" 
                    data-toggle="modal" data-target="#uploadDetailsModal"><i class="fa fa-eye"></i></a>';
       
                    return $button;
                })
                ->addColumn('is_verified', function($c){
                    if($c->is_verified==2){
                        return 'For validation';
                    }
                })
                ->rawColumns(['action', 'is_verified'])
                ->make(true);
        }

        return view('identity-verification');
    }

    public function getCustomerUploads()
    {
        return DB::table('tbl_identity_verification as I')
                ->select('I.*', 'C.*')
                ->leftJoin('tblcustomer AS C', 'C.id', '=', 'I.user_id') 
                ->where('C.is_verified', 2)
                ->get();
    }

    public function showUploadDetails($user_id)
    {
        return DB::table('tbl_identity_verification as I')
                ->select('I.*', 'C.is_verified')
                ->leftJoin('tblcustomer AS C', 'C.id', '=', 'I.user_id') 
                ->where('I.user_id', $user_id)
                ->get();
    }

    public function approve(Request $request)
    {
        DB::table('tblcustomer')
                ->where('id', $request->input('user_id'))
                ->update([
                    'is_verified' => 1
                ]);
        return \Redirect::to('/identity-verification')->with('success', 'Customer was successfully verified!'); 
    }

    public function decline(Request $request)
    {
        DB::table('tblcustomer')
        ->where('id', $request->input('user_id'))
        ->update([
            'is_verified' => 0
        ]);
        DB::table('tbl_identity_verification')
                ->where('user_id', $request->input('user_id'))
                ->delete();
        return \Redirect::to('/identity-verification')->with('success', 'Customer was successfully declined!'); 
    }
}
