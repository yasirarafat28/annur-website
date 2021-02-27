<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PageContent extends Model
{
    //

    public static function getContent($slug){
        $content = PageContent::where('slug',$slug)->first();

        if(!$content){
            return '';
        }

        return $content->content;

    }
}
