<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use App\Maintenance\Category;
use Illuminate\Http\Request;
use Input;
use Illuminate\Support\Facades\DB;
use App\Utilities\User;
use App\Utilities\AuditTrail;

class CategoryCtr extends Controller
{
    private $tbl_cat = 'tblcategory';
    private $module = 'Maintenance';

    public function index(){

        $user = new User;
        $user->isUserAuthorize($this->module);

        $cm = $this->displayCategory();

        if(request()->ajax())
        {
            return datatables()->of($cm)
                ->addColumn('action', function($cm){
                    $button = ' <a class="btn btn-sm btn-primary" id="btn-edit" edit-id="'. $cm->id .'" 
                    data-toggle="modal" data-target="#editModal"><i class="fa fa-edit"></i></a>';
                  //  $button .= '<a class="btn btn-sm" id="btn-delete" delete-id="'. $cm->id .'"><i style="color:#DC3545;" class="fa fa-trash-o"></i></a>';
                    return $button;
                })
                ->addColumn('image', function($cat){
                    if($cat->image){
                        $img = '<img src="../../storage/'. $cat->image .'" style="width:200px; max-height:200px;">';
                    }
                    else{
                        $img = '<img src="../../storage/img-placeholder.png" style="width:200px; max-height:200px;">';
                    }
             
                    return $img;
                })
                ->addColumn('is_active', function($cat){
                    if($cat->is_active==1){
                        $status = '<span class="badge badge-success" style="background:#28A745;">Active</span>';
                    }
                    else{
                        $status = '<span class="badge badge-danger">Inactive</span>';
                    }
             
                    return $status;
                })
                ->rawColumns(['action', 'image', 'is_active'])
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

    public function store(Request $request)
    {
        $data = Input::all();
        $cm = new Category;
        $cm->category = $data['category'];
        $cm->is_active = $data['status'];
        $cm->save();

        if(request()->hasFile('image')){
            request()->validate([
                'image' => 'file|image|max:5000',
            ]);
            
        $this->storeImage($cm->id);

        $audit = new AuditTrail;
        $audit->recordAction($this->module, 'Add Category');

        return redirect('/maintenance/category')->with('success', 'Data Saved');
       }
    }

    public function storeImage($id)
    {
        if(request()->has('image'))
        {
            Category::where('id', $id)
            ->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);
        }
    }   

    public function show($id){
        $res = DB::table($this->tbl_cat)
        ->select($this->tbl_cat.'.*')
        ->where('id', $id)
        ->get();

        return $res;
    }

    public function update(Request $request)
    {
        $data = Input::all();
        $cm = new Category;
        $cm->category = $data['category'];
        $cm->is_active = $data['status'];
        
        Category::where('id', $data['id'])
        ->update([
            'category' => $cm->category,
            'is_active' => $cm->is_active
            ]);

            if(request()->hasFile('image')){
                request()->validate([
                    'image' => 'file|image|max:5000',
                ]);
                
            $this->storeImage($data['id']);
            }

            $audit = new AuditTrail;
            $audit->recordAction($this->module, 'Update Category');

        return redirect('/maintenance/category')->with('success', 'Data Updated');
    }

    public function delete($id){
        $cm = Category::findOrFail($id);
        $cm->delete();

        $audit = new AuditTrail;
        $audit->recordAction($this->module, 'Delete Category');

        return $cm;
    }
    
}
