<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Socialite;
use Redirect;

class LoginCtr extends Controller
{
    public function index(){
        return view('customer/login');
    }

    public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }
   
    public function handleGoogleCallback()
    {
        try {
  
            $user = Socialite::driver('google')->user();
           
            $this->googleLogin($user->email, $user->name, $user->avatar);
  
        } catch (Exception $e) {
            return redirect('user-login/google');
        }
    }

    public function googleLogin($email, $name, $avatar){

        $account =  DB::table('tblcustomer')->where('email', $email)->get();  

        if($account->count() > 0)
        {
            $this->putToSession($email, $avatar);
            return redirect('/home')->send();
        }
        else
        {
            $this->putToSession($email, $avatar);

            DB::table('tblcustomer')
                ->insert([
                    'fullname' => $name,
                    'email' => $email,
                    'created_at' => date('Y-m-d')
                ]);
            
            return redirect('/home')->send();
        }
    }

    public function putToSession($email, $avatar){
        session()->put('email', $email);
        session()->put('avatar', $avatar);
        session()->put('is-customer-logged', 'yes');
    }

   

    public function isLoggedIn(){
        if(session()->get('is-customer-logged') == 'yes'){
   
            return Redirect::to('/home'); 
        }
        else{
            return Redirect::to('/user-login'); 
        }
    }
}
