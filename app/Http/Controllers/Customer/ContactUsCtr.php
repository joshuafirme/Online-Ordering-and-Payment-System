<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Input, Redirect;
use Mail;
use App\Mail\ContactUs;
class ContactUsCtr extends Controller
{
    public function index(){
        
        return view('customer.contact-us');
    }

    public function sendMail()
    {
        $data = Input::all();

        $message =  "<p>From: " . $data['email']  . "</p>" .
                    "<p>Name: " . $data['fullname']  . "</p>" . 
                    "<p>Subject: " . $data['subject'] . "</p>" . 
                    "<p>Message: " . $data['message'] . "</p>";

        Mail::to('joshuafirme1@gmail.com')->send(new ContactUs($message));
    }
}
