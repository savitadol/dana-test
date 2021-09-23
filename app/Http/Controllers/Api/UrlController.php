<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Url;
use App\Rules\UrlRule;

class UrlController extends Controller
{
    public function findUrl(Request $request){
        $validator = \Validator::make($request->all(), [
            'destination' => ['required',new UrlRule],
        ]);

        if ($validator->fails()) {
          return response()->json($validator->errors(),200);
        }
       

        $url = Url::where('destination',$request->destination)->first();

        if($url){
            return response()->json($url);
        }else{
            return response()->json(['status'=>true, 'message'=>"No data found"]);
        }


    }
}
