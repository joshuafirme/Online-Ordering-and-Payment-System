<?php

namespace App\Utilities;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = 'tbluser';
    protected $fillable = ['id', '_prefix', 'fullname', 'password', 'username', 'contact_no', 'role'];

    public function isLoggedIn(){
        if(session()->get('is-login') !== 'yes'){
   
           return redirect()->to('/admin-login')->send();
        }
    }

    public function isUserAuthorize($module){

        $this->isLoggedIn();
        
        $emp = DB::table($this->table)
        ->where([
            ['username', session()->get('emp-username')],
        ])
        ->value('auth_modules');

        $modules_arr = array('Transaction', 'Maintenance', 'Reports', 'Utilities');

        if (!(in_array($module, $modules_arr)))
        {
            return false;
        }
        else{
            return true;
        }
    }
    

    public function getPosition(){
        $position = DB::table($this->table)
        ->where([
            ['username', session()->get('emp-username')],
        ])
        ->value('position');

        return $position;
    }

    public function notAuthMessage(){
        dd('You are not authorized to access this module. Please see the administrator!');
    }
}
