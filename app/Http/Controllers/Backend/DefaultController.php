<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Blogs;
use App\Models\Projects;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Collection;


class DefaultController extends Controller
{
    public function index()
    {
        $blogCounter = DB::table('blogs')->count();
        $userCounter = DB::table('users')->count();
        $pageCounter = DB::table('pages')->count();
        $projectCounter = DB::table('projects')->count();
        $data1['blog'] = Blogs::all()->sortByDesc('id')->take(5);
        $data2['project'] = Projects::all()->sortByDesc('id');
        return view('backend.default.index', compact('blogCounter', 'userCounter', 'pageCounter', 'projectCounter', 'data1','data2'));

    }


    public function login()
    {

        return view('backend.default.login');

    }

    public function authenticate(Request $request)
    {

        $request->flash();
        $credentials = $request->only('email', 'password');
        $remember_me = $request->has('remember_me') ? true : false;

        if (Auth::attempt($credentials)) {

            return redirect()->intended(route('nedmin.Index'));

        } else {

            return back()->with('error', 'Hatalı Kullanıcı');

        }

    }

    public function logout()
    {

        Auth::logout();
        return redirect(route('nedmin.Login'))->with('success', 'Güvenli çıkış yapıldı.');

    }
}
