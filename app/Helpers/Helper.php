<?php
use App\Models\Url;

function generate_slug(){
    $slug = substr(md5(mt_rand()), 0, 5);
    
    //Check whether slug already exists
    $slug_exists = Url::where('slug',$slug)->exists();
    if($slug_exists){
        generate_slug();
    }

    return $slug;
}

function dateformat($date,$format="m/d/Y h:i A"){
    return date($format,strtotime($date));
}