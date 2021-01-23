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

    public function getCategory(){
        $res = DB::table($this->table.' as G')
                ->select('id', 'category')
                ->get();

        return $res->unique('category');
    }

    public function getMenu($category){
        $res = DB::table($this->table)
        ->where('category', $category)
        ->pluck('menu');

        return $res;
    }
}
