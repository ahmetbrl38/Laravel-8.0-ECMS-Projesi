<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Pages;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function detail($slug){

        $pageList = Pages::all()->sortByDesc('id');
        $page=Pages::where('page_slug',$slug)->first();
        return view('frontend.page.detail',compact('page','pageList'));

    }
}
