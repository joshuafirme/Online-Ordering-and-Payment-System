<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use DB, Auth;

class Base
{
    public static function getName()
    {
       return DB::table('tblcustomer')->where('id', Auth::id())->value('fullname');
    }
}