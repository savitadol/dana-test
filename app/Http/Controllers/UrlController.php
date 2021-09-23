<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Url;
use App\Rules\UrlRule;


class UrlController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $urls = Url::paginate(10);
        
        return view('url.create',['urls'=>$urls]);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $request->validate([
            'destination' => ['required',new UrlRule],
        ]);

        $data = [];

        $data['destination'] = $request->destination;
        $data['slug']        = generate_slug();
        $url = Url::create($data);
        return redirect()->route('url.index')->with('status','Url Shortened Successfully');

    }

    

    public function destination(Url $url){
       
        
        $destination = $url->destination;
        $destinationurl = strpos($destination, 'http') !== 0 ? "http://$destination" : $destination;
        return  redirect()->to($destinationurl);
        
    }
}
