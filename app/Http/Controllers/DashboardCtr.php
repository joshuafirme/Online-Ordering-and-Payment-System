<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;
use Redirect;

class DashboardCtr extends Controller
{
    public function index(){
        if(session()->get('is-login') !== 'yes'){
   
            return Redirect::to('user-login');
        }
    
        return View::make('dashboard');
    }
}
