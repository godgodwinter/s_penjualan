<?php

namespace App\Http\Controllers;

use App\Models\portofolio;
use Illuminate\Http\Request;

class landingController extends Controller
{
    public function index(){
        $pages='portofolio';
        $items=portofolio::with('label')->get();
        return view('pages.landing.portofolio.index',compact('items','pages'));
    }
    public function show($slug){
        $pages='portofolio';
        $item=portofolio::with('label')->where('slug',$slug)->first();
        // dd($slug,$item);
        if($item==null){
            abort(404);
        }
        return view('pages.landing.portofolio.show',compact('item','pages'));
    }
}
