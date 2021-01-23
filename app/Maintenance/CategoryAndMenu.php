<?php

namespace App\Maintenance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CategoryAndMenu extends Model
{
    protected $table = 'tblmenu';
    protected $fillable = ['id', 'category', 'menu'];

    public function getCategoryAndMenu(){
        $res = DB::table($this->table)
        ->select($this->table.'.*')
        ->get();

        return $res;
    }

    public function show($id){
        $res = DB::table($this->table)
        ->select($this->table.'.*')
        ->where('id', $id)
        ->get();

        return $res;
    }

   
}
