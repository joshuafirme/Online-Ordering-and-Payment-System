<?php

namespace App\Transaction;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Cashiering extends Model
{
    protected $tbl_menu = 'tblmenu';
    protected $tbl_category = 'tblcategory';

    public function getCategory(){
        $res = DB::table($this->table)
        ->select($this->table.'.*')
        ->get();

        return $res;
    }
}
