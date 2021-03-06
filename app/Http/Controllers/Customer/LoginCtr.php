<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Socialite;
use Redirect;
use Auth, Input, Session;

class LoginCtr extends Controller
{
    public function index()
    {
        if(Auth::check())
        {
            return redirect('/home'); 
        }
        else
        {
            return view('customer/login');
        }
  //      Auth::logout();
  //      return view('customer/login');
    }

    public function login()
    {
        $data = Input::all();

        if(Auth::attempt(['username' => $data['username'], 'password' => $data['password']]))
        {
            return Redirect::to('/home'); 
        }
        else{
            return Redirect::to('/customer/customer-login')->with('invalid', 'Invalid username or password'); 
        }
    }

    public function logout()
    {
        Auth::logout();
        Session::forget('customer-id');
        Redirect::to('/home')->send(); 
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

        $id = DB::table('tblcustomer')->where('email', $email)->value('id');  
        session()->put('customer-id', $id);
        if($account->count() > 0)
        {
           // $this->putToSession($email, $avatar);
            return redirect('/home')->send();
        }
        else
        {
           // $this->putToSession($email, $avatar);

            $user_id = DB::table('tblcustomer')
                ->insertGetId([
                    'username' => $email,
                    'fullname' => $name,
                    'email' => $email,
                    'is_verified' => 0,
                    'created_at' => date('Y-m-d')
                ]);

            session()->put('customer-id', $user_id);
            
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
