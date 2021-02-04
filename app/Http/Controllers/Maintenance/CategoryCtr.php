<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Maintenance\Category;
use Illuminate\Http\Request;
use Input;
use Illuminate\Support\Facades\DB;
use App\Utilities\User;

class CategoryCtr extends Controller
{
    private $module = 'Maintenance';
    private $tbl_cat = 'tblcategory';

    public function index(){

        $cm = $this->displayCategory();

        if(request()->ajax())
        {
            return datatables()->of($cm)
                ->addColumn('action', function($cm){
                    $button = ' <a class="btn btn-sm btn-primary" id="btn-edit" edit-id="'. $cm->id .'" 
                    data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>';
                    $button .= '<a class="btn btn-sm" id="btn-delete" delete-id="'. $cm->id .'"><i style="color:#DC3545;" class="fa fa-trash-o"></i></a>';
                    return $button;
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('maintenance/category');
    }

    public function displayCategory(){
        $res = DB::table($this->tbl_cat)
        ->select($this->tbl_cat.'.*')
        ->get();

        return $res;
    }

    public function store(Request $request){
        $cm = new Category;
        $cm->category = $request->input('category');
        $cm->save();

        return redirect('/maintenance/category')->with('success', 'Data Saved');
    }

    public function show($id){
        $res = DB::table($this->tbl_cat)
        ->select($this->tbl_cat.'.*')
        ->where('id', $id)
        ->get();

        return $res;
    }

    public function update(Request $request){
        $cm = new Category;
        $cm->id = $request->input('id');
        $cm->category = $request->input('category');
        
        Category::where('id', $cm->id)
        ->update([
            'category' => $cm->category
            ]);

        return redirect('/maintenance/category')->with('success', 'Data Updated');
    }

    public function delete($id){
        $cm = Category::findOrFail($id);
        $cm->delete();
        return $cm;
    }
    
}
