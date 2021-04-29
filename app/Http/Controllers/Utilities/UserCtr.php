<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utilities\User;
use Illuminate\Support\Facades\DB;

class UserCtr extends Controller
{
    private $module = 'Utilities';

    public function index(){

        $user = new User;
        $user->isUserAuthorize($this->module);

        $user = $this->getUser();
        if(request()->ajax())
        {
            return datatables()->of($user)
                ->addColumn('action', function($user){
                    $button = ' <a class="btn btn-sm btn-primary" id="btn-edit-user" edit-id="'. $user->id .'" 
                    data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>';
                   // $button .= '<a class="btn btn-sm" id="btn-delete-user" delete-id="'. $user->id .'"><i style="color:#DC3545;" class="fa fa-trash-o"></i></a>';
                    return $button;
                })
                ->addColumn('status', function($user){
                    if($user->is_active==1){
                        return '<span class="badge" style="background-color:#28A745;">Active</span>';
                    }
                    else{
                        return '<span class="badge">Inactive</span>';
                    }
                })
                ->rawColumns(['action', 'status'])
                ->make(true);
        }
        return view('utilities/user');
    }

    public function store(Request $request){

        DB::table('tbluser')
                ->insert([
                    '_prefix' => 'E'.date('Yd'),
                    'fullname' => $request->input('fullname'),
                    'username' => $request->input('username'),
                    'password' => $request->input('password'),
                    'role' => $request->input('role'),
                    'is_active' => 1,
                    'contact_no' => $request->input('contact_no'),
                    'created_at' => date('Y-m-d h:m:s'),
                ]);

        return redirect('/utilities/user')->with('success', 'Data Saved');
    }

    public function update(Request $request){
        DB::table('tbluser')
            ->where('id', $request->input('id'))
            ->update([
                'fullname' => $request->input('fullname'),
                'username' => $request->input('username'),
                'password' => $request->input('password'),
                'role' => $request->input('role'),
                'is_active' => $request->input('status'),
                'contact_no' => $request->input('contact_no'),
                'updated_at' => date('Y-m-d h:m:s'),
            ]);

        return redirect('/utilities/user')->with('success', 'Data updated successfully');
    }

    public function getUser(){
        $res = DB::table('tbluser as U')
        ->select('U.*', DB::raw('CONCAT(U._prefix, U.id) as emp_id'))
        ->get();

        return $res;
    }

    public function showUserDetails($id){
        $res = DB::table('tbluser as U')
        ->select('U.*', DB::raw('CONCAT(U._prefix, U.id) as emp_id'))
        ->where('id', $id)
        ->get();

        return $res;
    }

    public function deleteUser($id){

       DB::table('tbluser')->where('id', $id)->delete();

    }
}
