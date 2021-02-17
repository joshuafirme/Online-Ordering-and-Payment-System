<?php

namespace App\Maintenance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Menu extends Model
{
    protected $table = 'tblmenu';
    protected $tbl_cat = 'tblcategory';
    protected $fillable = ['id', 'description', 'price', 'category_id', 'preparation_time', 'image', 'status'];



   

}
