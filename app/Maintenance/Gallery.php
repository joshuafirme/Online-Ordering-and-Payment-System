<?php

namespace App\Maintenance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Gallery extends Model
{
    protected $table = 'tblgallery';
    protected $tblmenu = 'tblmenu';
    protected $fillable = ['id', 'category', 'menu', 'gallery'];

    public function getGallery(){
        $res = DB::table($this->table.' as G')
        ->select('G.*')
        ->get();

        return $res;
    }

    public function show($id){
        $res = DB::table($this->table.' as G')
        ->select('G.*')
        ->where('id', $id)
        ->get();

        return $res;
    }

   

}
