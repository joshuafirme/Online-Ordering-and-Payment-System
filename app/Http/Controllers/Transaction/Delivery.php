<?php

namespace App\Http\Controllers\Transaction;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Utilities\User;

class Delivery extends Controller
{
    private $module = 'Transaction';

    public function index(){

        $user = new User;
        $user->isUserAuthorize($this->module);

    }
}
