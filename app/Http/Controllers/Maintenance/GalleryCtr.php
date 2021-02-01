<?php

namespace App\Http\Controllers\Maintenance;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryCtr extends Controller
{
    public function index(){
        return view('maintenance/gallery',['gallery' => $this->getGallery()]);
    }

    public function getGallery(){
        return DB::table('tblgallery')->paginate(2);
    }

    public function store(){
  
        if(request()->hasFile('image')){
            request()->validate([
                'image' => 'file|image|max:5000',
            ]);

            DB::table('tblgallery')
            ->insert([
                'image' => request()->image->store('gallery', 'public'),
            ]);
        }

        return redirect('/maintenance/gallery')->with('success', 'Image added successfully');
    }

    public function delete($id){
        DB::table('tblgallery')->delete($id);
    }
}
