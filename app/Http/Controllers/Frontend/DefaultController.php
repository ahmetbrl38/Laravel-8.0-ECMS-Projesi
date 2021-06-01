<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Mail\SendMail;
use Illuminate\Http\Request;
use App\Models\Sliders;
use App\Models\Blogs;
use Illuminate\Support\Facades\Mail;

class DefaultController extends Controller
{
    public function index(){

        $data['blog']= Blogs::all()->sortByDesc('id');
        $data['slider']= Sliders::all()->sortByDesc('id');
        return view('frontend.default.index',compact('data'));

    }

    public function contact(){

        return view('frontend.default.contact');

    }

    public function about(){

        return view('frontend.default.about');

    }

    public function sendMail(Request $request){

        $request->validate([

            'name' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'message' => 'required'

        ]);

        $data=[

            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'message' => $request->message,

        ];

        Mail::to('burulahmet38@gmail.com')->send(new SendMail($data));
        return back()->with('success','Mail başarıyla gönderildi.');
    }

}
