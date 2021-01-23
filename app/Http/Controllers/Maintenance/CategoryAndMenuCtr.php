<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Maintenance\CategoryAndMenu;
use Illuminate\Http\Request;
use Input;
use Illuminate\Support\Facades\DB;

class CategoryAndMenuCtr extends Controller
{
    public function index(){

        $cm = $this->displayCategoryAndMenu();

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
        return view('maintenance/menu_category');
    }

    public function displayCategoryAndMenu(){
        $cm = new CategoryAndMenu;
        return $cm->getCategoryAndMenu();
    }

    public function store(Request $request){
        $cm = new CategoryAndMenu;
        $cm->category = $request->input('category');
        $cm->menu = $request->input('menu');
        $cm->save();

        return redirect('/maintenance/menu_category')->with('success', 'Data Saved');
    }

    public function show($id){
        $cm = new CategoryAndMenu;
        return $cm->show($id);
    }

    public function update(Request $request){
        $cm = new CategoryAndMenu;
        $cm->id = $request->input('id');
        $cm->category = $request->input('category');
        $cm->menu = $request->input('menu');
        
        CategoryAndMenu::where('id', $cm->id)
        ->update([
            'category' => $cm->category,
            'menu' => $cm->menu,
            ]);

        return redirect('/maintenance/menu_category')->with('success', 'Data Updated');
    }

    public function delete($id){
        $cm = CategoryAndMenu::findOrFail($id);
        $cm->delete();
        return $cm;
    }
}
