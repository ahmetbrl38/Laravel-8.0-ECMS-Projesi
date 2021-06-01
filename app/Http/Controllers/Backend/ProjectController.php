<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Projects;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['project'] = Projects::all()->sortBy('project_must');
        return view('backend.projects.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (strlen($request->project_slug)>3)
        {
            $slug=Str::slug($request->project_slug);
        } else {
            $slug=Str::slug($request->project_title);
        }

        if ($request->hasFile('project_file'))
        {
            $request->validate([
                "project_type" => 'required',
                'project_title' => 'required',
                'project_content' => 'required',
                'project_file' => 'required|image|mimes:jpg,jpeg,png|max:4096'
            ]);

            $file_name=uniqid().'.'.$request->project_file->getClientOriginalExtension();
            $request->project_file->move(public_path('images/projects'),$file_name);
        } else {
            $file_name=null;
        }



        $project=Projects::insert(
            [
                "project_type" => $request->project_type,
                "project_title" => $request->project_title,
                "project_explanation" => $request->project_explanation,
                "project_slug" => $slug, //işlem
                "project_file" => $file_name,//İşlem
                "project_content" => $request->project_content,
                "project_status" => $request->project_status,
            ]
        );

        if ($project)
        {
            return redirect(route('project.index'))->with('success','İşlem Başarılı');
        }
        return back()->with('error','İşlem Başarısız');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $projects=Projects::where('id',$id)->first();
        return view('backend.projects.edit')->with('projects',$projects);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (strlen($request->project_slug)>3)
        {
            $slug=Str::slug($request->project_slug);
        } else {
            $slug=Str::slug($request->project_title);
        }

        if ($request->hasFile('project_file'))
        {
            $request->validate([
                'project_title' => 'required',
                'project_content' => 'required',
                'project_file' => 'required|image|mimes:jpg,jpeg,png|max:4096'
            ]);

            $file_name=uniqid().'.'.$request->project_file->getClientOriginalExtension();
            $request->project_file->move(public_path('images/projects'),$file_name);

            $project=Projects::Where('id',$id)->update(
                [
                    "project_type" => $request->project_type,
                    "project_title" => $request->project_title,
                    "project_explanation" => $request->project_explanation,
                    "project_slug" => $slug, //işlem
                    "project_file" => $file_name,//İşlem
                    "project_content" => $request->project_content,
                    "project_status" => $request->project_status,
                ]
            );

            $path='images/projects/'.$request->old_file;
            if (file_exists($path))
            {
                @unlink(public_path($path));
            }

        } else {
            $project=Projects::Where('id',$id)->update(
                [
                    "project_type" => $request->project_type,
                    "project_title" => $request->project_title,
                    "project_explanation" => $request->project_explanation,
                    "project_slug" => $slug, //işlem
                    "project_content" => $request->project_content,
                    "project_status" => $request->project_status,
                ]
            );
        }


        if ($project)
        {
            return back()->with('success','İşlem Başarılı');
        }
        return back()->with('error','İşlem Başarısız');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project=Projects::find(intval($id));
        if ($project->delete())
        {
            echo 1;
        }
        echo 0;
    }

    public function sortable()
    {
//        print_r($_POST['item']);

        foreach ($_POST['item'] as $key => $value) {
            $projects = Projects::find(intval($value));
            $projects->project_must = intval($key);
            $projects->save();
        }
        echo true;
    }

}
