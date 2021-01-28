<?php

namespace App\Maintenance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    protected $tbl_menu = 'tblmenu';
    protected $tbl_cat = 'tblcategory';
    protected $fillable = ['id', 'description', 'price', 'category_id', 'preparation_time', 'image', 'status'];

    public function getMenu(){
        $res = DB::table($this->tbl_menu.' as M')
        ->select('M.*', 'category')
        ->leftJoin($this->tbl_cat.' AS C', 'C.id', '=', 'M.category_id')    
        ->get();

        return $res;
    }

    public function getAvailableMenu($search_key){
        $res = DB::table($this->tbl_menu.' as M')
        ->select('M.*', 'category')
        ->leftJoin($this->tbl_cat.' AS C', 'C.id', '=', 'M.category_id')
        ->where('M.description','LIKE', '%'.$search_key.'%')   
        ->where('M.status', 'Available')   
        ->get();

        return $res;
    }

    public function show($id){
        $res = DB::table($this->tbl_menu.' as M')
        ->select('M.*', 'category')
        ->leftJoin($this->tbl_cat.' AS C', 'C.id', '=', 'M.category_id')  
        ->where('M.id', $id)
        ->get();

        return $res;
    }

   

}
