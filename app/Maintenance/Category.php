<?php

namespace App\Maintenance;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Category extends Model
{
    protected $table = 'tblcategory';
    protected $fillable = ['id', 'category', 'image', 'is_active'];


}
