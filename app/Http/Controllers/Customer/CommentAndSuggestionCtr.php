<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use View;
use Illuminate\Support\Facades\DB;
use Session;
use Redirect, Helper;

class CommentAndSuggestionCtr extends Controller
{
    public function index(){
        return View::make('customer.comment-and-suggestion');
    }

    public function store(Request $request)
    {
        DB::table('tblcomment_and_suggestion')
            ->insert([
                'fullname' => Helper::getName()!=null ? Helper::getName() : "Visitor",
                'comment' => $request->input('comment'),
                'suggestion' => $request->input('suggestion'),
                'created_at' => date('Y-m-d h:m:s'),
                'updated_at' => date('Y-m-d h:m:s')
            ]);

        return Redirect::to('customer/comment-and-suggestion')->with('success', 'Your comment and suggestion has been sent!');
    }
}
