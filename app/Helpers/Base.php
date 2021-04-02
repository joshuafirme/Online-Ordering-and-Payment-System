<?php // Code within app\Helpers\Helper.php

namespace App\Helpers;
use DB, Auth;

class Base
{
   public static function getName()
   {
      return DB::table('tblcustomer')->where('id', Auth::id())->value('fullname');
   }

   public static function getFullname()
   {
      return DB::table('tblcustomer')->where('id', Auth::id())->value('fullname');
   }

   public static function getEmail()
   {
      return DB::table('tblcustomer')->where('id', Auth::id())->value('email');
   }

   public static function getPhoneNo()
   {
      return DB::table('tblcustomer')->where('id', Auth::id())->value('phone_no');
   }

   public static function getShippingInfo()
   {
      return DB::table('tblshipping_address')->where('user_id', Auth::id())->first();
   }

   public static function getPosition()
   {
     return DB::table('tbluser')
     ->where([
         ['username', session()->get('emp-username')],
     ])
     ->value('role');
   }

     public static function getCartCount()
     {
         return DB::table('tblcart') 
                 ->where('user_id', Auth::id())
                 ->count('id');
     }

     public static function getCategories()
     {
         return DB::table('tblcategory')->where('is_active', 1)->get();
     }
}