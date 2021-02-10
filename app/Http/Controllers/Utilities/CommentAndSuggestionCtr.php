<?php

namespace App\Http\Controllers\Utilities;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CommentAndSuggestionCtr extends Controller
{
    public function index(){

        if(request()->ajax())
        {
            return datatables()->of($this->getCommentAndSuggestion())
                ->make(true);
        }
        return view('utilities.comment-and-suggestion');
   }

   public function getCommentAndSuggestion(){

    return DB::table('tblcomment_and_suggestion')->get();   
   }
}
