<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utilities\User;
use Illuminate\Support\Facades\DB;

class UserCtr extends Controller
{
    public function index(){
        $user = $this->getUser();
        if(request()->ajax())
        {
            return datatables()->of($user)
                ->addColumn('action', function($user){
                    $button = ' <a class="btn btn-sm btn-primary" id="btn-edit-user" edit-id="'. $user->id .'" 
                    data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>';
                    $button .= '<a class="btn btn-sm" id="btn-delete-user" delete-id="'. $user->id .'"><i style="color:#DC3545;" class="fa fa-trash-o"></i></a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('utilities/user');
    }

    public function store(Request $request){
        $user = new User;
        $user->_prefix = 'E'.date('Yd');
        $user->fullname = $request->input('fullname');
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->role = $request->input('role');
        $user->contact_no = $request->input('contact_no');
        $user->save();

        return redirect('/utilities/user')->with('success', 'Data Saved');
    }

    public function update(Request $request){
        $user = new User;
        $user->_prefix = 'E'.date('Yd');
        $user->fullname = $request->input('fullname');
        $user->username = $request->input('username');
        $user->password = $request->input('password');
        $user->role = $request->input('role');
        $user->contact_no = $request->input('contact_no');

        User::where('id', $request->input('id'))
        ->update([
            'fullname' => $user->fullname,
            'username' => $user->username,
            'password' => $user->password,
            'role' => $user->role,
            'contact_no' => $user->contact_no
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
