<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Projects;

class ProjectController extends Controller
{
    protected $dates = ['expired_at'];

    public function index(){

        $data['project']=Projects::all()->sortByDesc('id');
        return view('frontend.project.index',compact('data'));

    }

    public function detail($slug){

        $projectList = Projects::all()->sortBy('project_must');
        $project=Projects::where('project_slug',$slug)->first();
        return view('frontend.project.detail',compact('project','projectList'));

    }
}
