<?php

namespace App\Transaction;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cashiering extends Model
{
    protected $table = 'tblcashiering';
    protected $tbl_menu = 'tblmenu';
    protected $tbl_cat = 'tblcategory';
    protected $fillable = ['id', 'menu_id', 'amount', 'qty'];

    public function getTray(){
        $res = DB::table($this->table.' as CS')
        ->select('CS.*', 'description', 'category', 'price', 'CS.qty')
        ->leftJoin($this->tbl_menu.' AS M', 'M.id', '=', 'CS.menu_id') 
        ->leftJoin($this->tbl_cat.' AS C', 'C.id', '=', 'M.category_id')  
        ->get();

        return $res;
    }
}
