<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Maintenance\Menu;
use App\Maintenance\Category;
use Illuminate\Http\Request;
use Input;
use Illuminate\Support\Facades\DB;

class MenuCtr extends Controller
{
    public function index(){

        $g = $this->displayMenu();
        if(request()->ajax())
        {
            return datatables()->of($g)
                ->addColumn('action', function($g){
                    $button = ' <a class="btn btn-sm btn-primary" id="btn-edit-menu" edit-id="'. $g->id .'" 
                    data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>';
                    $button .= '<a class="btn btn-sm" id="btn-delete" delete-id="'. $g->id .'"><i style="color:#DC3545;" class="fa fa-trash-o"></i></a>';
                    return $button;
                })
                ->addColumn('image', function($g){
                    if($g->image){
                        $img = '<img src="../../storage/'. $g->image .'" style="width:200px; max-height:200px;">';
                    }
                    else{
                        $img = '<img src="../../storage/img-placeholder.png" style="width:200px; max-height:200px;">';
                    }
             
                    return $img;
                })
                ->rawColumns(['action', 'image'])
                ->make(true);
        }
        return view('maintenance/menu',['category' => $this->getCategory()]);
    }

    public function getCategory(){
        $c = new Category;
        return $c->getCategory();
    }

    public function displayMenu(){
        $g = new Menu;
        return $g->getMenu();
    }

    public function store(Request $request){
        $g = new Menu;
        $g->category_id = $request->input('category');
        $g->description = $request->input('description');
        $g->price = $request->input('price');
        $g->preparation_time = $request->input('prep_time');
        $g->status = $request->input('status');

        $g->save();

        if(request()->hasFile('image')){
            request()->validate([
                'image' => 'file|image|max:5000',
            ]);
        }
        $this->storeImage($g->id);

        return redirect('/maintenance/menu')->with('success', 'Data Saved');
    }


    public function update(Request $request){
        $g = new Menu;
        $g->id = $request->input('id');
        $g->category_id = $request->input('edit_category');
        $g->description = $request->input('edit_description');
        $g->price = $request->input('edit_price');
        $g->preparation_time = $request->input('edit_prep_time');
        $g->status = $request->input('edit_status');

        Menu::where('id', $g->id)
        ->update([
            'category_id' => $g->category_id,
            'description' => $g->description,
            'price' => $g->price,
            'preparation_time' => $g->preparation_time,
            'status' => $g->status
            ]);

        if(request()->hasFile('image')){
            request()->validate([
                'image' => 'file|image|max:5000',
            ]);
            
        $this->storeImage($g->id);
        }

        return redirect('/maintenance/menu')->with('success', 'Data updated successfully');
    }

    public function storeImage($id){
      
        if(request()->has('image')){
            Menu::where('id', $id)
            ->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);
        }
    }

    
    public function show($id){
        $g = new Menu;
        return $g->show($id);
    }

    public function delete($id){
        $g = Menu::findOrFail($id);
        $g->delete();
        return $g;
    }
}
