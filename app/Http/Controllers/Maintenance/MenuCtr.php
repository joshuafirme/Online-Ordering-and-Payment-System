<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Maintenance\Menu;
use App\Maintenance\Category;
use Illuminate\Http\Request;
use Input;
use Illuminate\Support\Facades\DB;
use App\Utilities\User;
use App\Utilities\AuditTrail;

class MenuCtr extends Controller
{
    private $tbl_menu = 'tblmenu';
    private $tbl_cat = 'tblcategory';
    private $module = 'Maintenance';

    public function index(){
        \Helper::updateMenuStatus();
        $user = new User;
        $user->isUserAuthorize($this->module);

        $menu = $this->displayMenu();
        if(request()->ajax())
        {
            return datatables()->of($menu)
                ->addColumn('action', function($menu){
                    $button = ' <a class="btn btn-sm btn-primary" id="btn-edit-menu" edit-id="'. $menu->id .'" 
                    data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>';
       
                    return $button;
                })
                ->addColumn('image', function($menu){
                    if($menu->image){
                        $img = '<img src="../../storage/'. $menu->image .'" style="width:200px; max-height:200px;">';
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
        $res = DB::table($this->tbl_cat)
        ->select($this->tbl_cat.'.*')
        ->get();

        return $res;
    }

    public function displayMenu(){
        $res = DB::table($this->tbl_menu.' as M')
        ->select('M.*', 'category')
        ->leftJoin($this->tbl_cat.' AS C', 'C.id', '=', 'M.category_id')    
        ->get();

        return $res;
    }

    public function store(Request $request){
        $g = new Menu;
        $g->category_id = $request->input('category');
        $g->description = $request->input('description');
        $g->qty = $request->input('qty');
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

        $audit = new AuditTrail;
        $audit->recordAction($this->module, 'Add Menu');

        return redirect('/maintenance/menu')->with('success', 'Data Saved');
    }


    public function update(Request $request){
        $g = new Menu;
        $g->id = $request->input('id');
        $g->category_id = $request->input('edit_category');
        $g->description = $request->input('edit_description');
        $g->qty = $request->input('edit_qty');
        $g->price = $request->input('edit_price');
        $g->preparation_time = $request->input('edit_prep_time');
        $g->status = $request->input('edit_status');

        Menu::where('id', $g->id)
        ->update([
            'category_id' => $g->category_id,
            'description' => $g->description,
            'qty' => $g->qty,
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

        $audit = new AuditTrail;
        $audit->recordAction($this->module, 'Update Menu');

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
        $res = DB::table($this->tbl_menu.' as M')
        ->select('M.*', 'category')
        ->leftJoin($this->tbl_cat.' AS C', 'C.id', '=', 'M.category_id')  
        ->where('M.id', $id)
        ->get();

        return $res;
    }

    public function delete($id){
        $g = Menu::findOrFail($id);
        $g->delete();

        $audit = new AuditTrail;
        $audit->recordAction($this->module, 'Delete Menu');
        return $g;
    }
}
