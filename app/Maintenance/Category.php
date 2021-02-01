<?php

namespace App\Maintenance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = 'tblcategory';
    protected $fillable = ['id', 'category'];

    public function getCategory(){
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
