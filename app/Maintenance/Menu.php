<?php

namespace App\Maintenance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    protected $table = 'tblmenu';
    protected $tbl_cat = 'tblcategory';
    protected $fillable = ['id', 'description', 'price', 'category_id', 'preparation_time', 'image', 'status'];

    public function getMenu(){
        $res = DB::table($this->table.' as M')
        ->select('M.*', 'category')
        ->leftJoin($this->tbl_cat.' AS C', 'C.id', '=', 'M.category_id')    
        ->get();

        return $res;
    }

    public function show($id){
        $res = DB::table($this->table.' as M')
        ->select('M.*', 'category')
        ->leftJoin($this->tbl_cat.' AS C', 'C.id', '=', 'M.category_id')  
        ->where('M.id', $id)
        ->get();

        return $res;
    }

   

}
