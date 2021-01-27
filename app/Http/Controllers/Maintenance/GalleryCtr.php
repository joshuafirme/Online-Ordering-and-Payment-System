<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Maintenance\Gallery;
use Illuminate\Http\Request;
use Input;
use Illuminate\Support\Facades\DB;

class GalleryCtr extends Controller
{
    public function index(){

        $g = $this->displayGallery();
        $c = $this->getCategory();
        if(request()->ajax())
        {
            return datatables()->of($g)
                ->addColumn('action', function($g){
                    $button = ' <a class="btn btn-sm btn-primary" id="btn-edit" edit-id="'. $g->id .'" 
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
        return view('maintenance/gallery',[
            'category' => $c
        ]);
    }

    public function displayGallery(){
        $g = new Gallery;
        return $g->getGallery();
    }

    public function getCategory(){
        $cm = new CategoryAndMenu;
        return $cm->getCategory();
    }

    public function getMenu($category){
        $cm = new CategoryAndMenu;
        return $cm->getMenu($category);
    }

    public function store(Request $request){
        $g = new Gallery;
        $g->category = $request->input('category');
        $g->menu = $request->input('menu');
        $g->save();

        if(request()->hasFile('image')){
            request()->validate([
                'image' => 'file|image|max:5000',
            ]);
        }
        $this->storeImage($g->id);

        return redirect('/maintenance/gallery')->with('success', 'Data Saved');
    }

    public function show($id){
        $g = new Gallery;
        return $g->show($id);
    }

    public function update(Request $request){
        $g = new Gallery;
        $g->id = $request->input('id');
        $g->category = $request->input('category');
        $g->menu = $request->input('menu');

        Gallery::where('id', $g->id)
        ->update([
            'category' => $g->category,
            'menu' => $g->menu,
             ]);

        if(request()->hasFile('image')){
            request()->validate([
                'image' => 'file|image|max:5000',
            ]);
            
        $this->storeImage($g->id);
        }

        return redirect('/maintenance/gallery')->with('success', 'Data updated successfully');
    }

    public function storeImage($id){
      
        if(request()->has('image')){
            Gallery::where('id', $id)
            ->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);
        }
    }

    public function delete($id){
        $g = Gallery::findOrFail($id);
        $g->delete();
        return $g;
    }
}
