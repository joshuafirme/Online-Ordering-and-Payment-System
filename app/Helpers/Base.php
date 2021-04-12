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

   public static function countPending()
   {
      return DB::table('tblorders')->distinct('order_no')->where('status', 1)->count();
   }

   public static function countPreparing()
   {
      return DB::table('tblorders')->distinct('order_no')->where('status', 2)->count();
   }

   public static function countDispatch()
   {
      return DB::table('tblorders')->distinct('order_no')->where('status', 3)->count();
   }

   public static function getTransactionNumber()
   {
       $trans_no = DB::table('tblgross_sale')->max('transaction_no');

       return ++ $trans_no;
   }
   
   public static function getOrderNumber()
   {
       $order_no = DB::table('tblorders')->max('order_no');

       return ++ $order_no;
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


      public static function getMenuByOrderNumber($order_no)
      {
         return DB::table('tblorders as O')
         ->select('O.*', 'C.*', 'M.*', 'category', 'O.created_at', 'O.amount')
         ->leftJoin('tblcustomer AS C', 'C.id', '=', 'O.user_id') 
         ->leftJoin('tblmenu AS M', 'M.id', '=', 'O.menu_id')  
         ->leftJoin('tblcategory AS CT', 'CT.id', '=', 'M.category_id')  
         ->where('O.order_no', $order_no)
         ->get();
      }

      public static function getTotalAmount($order_no)
      {
         return DB::table('tblorders as O') 
         ->where('O.order_no', $order_no)
         ->sum('amount');
      }
}