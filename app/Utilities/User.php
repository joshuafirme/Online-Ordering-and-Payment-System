<?php

namespace App\Utilities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Redirect;

class User extends Model
{
    protected $table = 'tblcustomer';
   // protected $fillable = ['id', '_prefix', 'fullname', 'password', 'username', 'contact_no', 'role'];

    public function isLoggedIn(){
        if(session()->get('is-login') !== 'yes'){
   
           return Redirect::to('/user-login');
        }
        else{
            return Redirect::to('/');
        }
    }

    public function isUserAuthorize($module){

        $this->isLoggedIn();
      
        $modules_arr = $this->getAuthModules();

        if (!(in_array($module, $modules_arr)))
        {      
             dd('You are not authorized to access this module. Please see the administrator!');
        }
    }

    public function getAuthModules(){
        switch($this->getPosition()) {
            case 'Admin':
                return array('Transaction', 'Maintenance', 'Reports', 'Utilities', 'Dashboard');
                break;
            case 'Cashier':
                return array('Transaction', 'Dashboard');
                break; 
            case 'Receptionist':
                return array('Transaction', 'Dashboard');
            case 'Delivery Man':
                return array('Transaction', 'Dashboard');
                break;    
          }
    }
    

    public function getPosition(){
        return DB::table('tbluser')
        ->where([
            ['username', session()->get('emp-username')],
        ])
        ->value('role');
    }

}
