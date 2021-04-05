<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    //

    public function department($type=''){

        $content = Content::where('type',$type)->first();
        if(!$content){
            return back();
        }

        return view('department',compact('content'));

    }
}
