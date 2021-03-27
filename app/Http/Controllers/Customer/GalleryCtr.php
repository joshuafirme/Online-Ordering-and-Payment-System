<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GalleryCtr extends Controller
{
    public function index(){
        
        return view('customer.gallery',[
            'gallery' => $this->displayGallery()
        ]);
    }

    public function displayGallery(){
        return DB::table('tblgallery')->paginate();
    }
}
