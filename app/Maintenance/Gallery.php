<?php

namespace App\Maintenance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Gallery extends Model
{
    protected $table = 'tblgallery';
    protected $fillable = ['id', 'image'];

    public function getGallery(){
        $res = DB::table($this->table.' as G')
        ->select('G.*')
        ->get();

        return $res;
    }

   

}
